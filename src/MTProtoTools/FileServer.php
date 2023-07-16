<?php

declare(strict_types=1);

/**
 * Files module.
 *
 * This file is part of MadelineProto.
 * MadelineProto is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * MadelineProto is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Affero General Public License for more details.
 * You should have received a copy of the GNU General Public License along with MadelineProto.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * @author    Daniil Gentili <daniil@daniil.it>
 * @copyright 2016-2023 Daniil Gentili <daniil@daniil.it>
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
 * @link https://docs.madelineproto.xyz MadelineProto documentation
 */

namespace danog\MadelineProto\MTProtoTools;

use Amp\Sync\LocalKeyedMutex;
use AssertionError;
use danog\MadelineProto\API;
use danog\MadelineProto\EventHandler\Media;
use danog\MadelineProto\EventHandler\Message;
use danog\MadelineProto\Ipc\Runner\WebRunner;
use Exception;
use Throwable;

use function Amp\File\exists;
use function Amp\File\read;
use function Amp\File\write;

/**
 * @internal
 */
trait FileServer
{
    private const POWERED_BY_MADELINEPROTO = 'Powered by MadelineProto '.API::RELEASE.' (https://docs.madelineproto.xyz)';
    /**
     * Downloads a file to the browser using the specified session file.
     */
    public static function downloadServer(string $session): void
    {
        if (isset($_GET['c'])) {
            self::$checkedScripts[$_GET['c']] = $_GET['i'];
            die;
        }
        if (!isset($_GET['f'])) {
            die(self::POWERED_BY_MADELINEPROTO);
        }

        $API = new API($session);
        $API->downloadToBrowser(
            messageMedia: $_GET['f'],
            size: $_GET['s'],
            name: $_GET['n'],
            mime: $_GET['m']
        );
    }

    /**
     * Get download link of media file.
     */
    public function getDownloadLink(array|string|Message|Media $media, ?string $scriptUrl = null): string
    {
        if ($scriptUrl === null) {
            try {
                $scriptUrl = $this->getDefaultDownloadScript();
            } catch (Throwable $e) {
                $sessionPath = \var_export($this->getSessionName(), true);
                throw new Exception("Could not generate default download script, please create a dl.php file with the following content: <?php require 'vendor/autoload.php'; \danog\MadelineProto\API::downloadServer($sessionPath); ?> and pass the URL to the second parameter of getDownloadLink: ".$e->getMessage());
            }
        } else {
            $this->checkDownloadScript($scriptUrl);
        }
        if ($media instanceof Message) {
            $media = $media->media;
        }
        if ($media instanceof Media) {
            $f = $media->botApiFileId;
            $name = $media->fileName;
            $mime = $media->mimeType;
            $size = $media->size;
        } else {
            $f = $this->extractBotAPIFile($this->MTProtoToBotAPI($media))['file_id'];
            [
                'name' => $name,
                'ext' => $ext,
                'mime' => $mime,
                'size' => $size,
            ] = $this->getDownloadInfo($media);
            $name = "$name.$ext";
        }

        return $scriptUrl."?".\http_build_query([
            'f' => $f,
            'n' => $name,
            'm' => $mime,
            's' => $size
        ]);
    }

    private static array $checkedAutoload = [];
    private const DOWNLOAD_SCRIPT = '<?php require "%s"; \danog\MadelineProto\API::downloadServer(__DIR__);';
    private function getDefaultDownloadScript(): string
    {
        if (PHP_SAPI === 'cli' || PHP_SAPI === 'phpdbg') {
            throw new AssertionError("Please specify a download script URL when using getDownloadLink via CLI!");
        }
        $s = $this->getSessionName();
        if (\defined(MADELINE_PHP)) {
            $autoloadPath = MADELINE_PHP;
        } elseif (\defined(MADELINE_PHAR)) {
            $autoloadPath = MADELINE_PHAR;
        } else {
            $paths = [
                \dirname(__DIR__, 4).'/autoload.php',
                \dirname(__DIR__, 2).'/vendor/autoload.php',
                \dirname(__DIR__, 6).'/autoload.php',
                \dirname(__DIR__, 4).'/vendor/autoload.php',
            ];

            foreach ($paths as $path) {
                if (exists($path)) {
                    $autoloadPath = $path;
                    break;
                }
            }

            if (!isset($autoloadPath)) {
                throw new AssertionError('Could not locate autoload.php in any of the following files: '.\implode(', ', $paths));
            }
        }

        if (isset(self::$checkedAutoload[$autoloadPath])) {
            return self::$checkedAutoload[$autoloadPath];
        }
        $downloadScript = \sprintf(self::DOWNLOAD_SCRIPT, \var_export($autoloadPath, true));
        $f = $s.DIRECTORY_SEPARATOR.\hash('sha256', $autoloadPath);
        $recreate = true;
        if (exists($f)) {
            $recreate = read($f) !== $downloadScript;
        }
        if ($recreate) {
            $temp = "$f.temp.php";
            write($temp, $downloadScript);
            \rename($temp, $f);
        }

        $f = \realpath($f);
        $absoluteRootDir = WebRunner::getAbsoluteRootDir();

        if (\substr($f, 0, \strlen($absoluteRootDir)) !== $absoluteRootDir) {
            throw new AssertionError("Process runner is not within readable document root!");
        }
        $f = \substr($f, \strlen($absoluteRootDir)-1);
        $f = \str_replace(DIRECTORY_SEPARATOR, '/', $f);
        $f = \str_replace('//', '/', $f);
        $f = 'https://'.$_SERVER['SERVER_NAME'].$f;
        $this->checkDownloadScript($f);
        return self::$checkedAutoload[$autoloadPath] = $f;
    }

    private static ?LocalKeyedMutex $checkMutex = null;
    private static array $checkedScripts = [];
    private function checkDownloadScript(string $scriptUrl): void
    {
        if (isset(self::$checkedScripts[$scriptUrl])) {
            return;
        }
        self::$checkMutex ??= new LocalKeyedMutex;
        $lock = self::$checkMutex->acquire($scriptUrl);
        try {
            if (isset(self::$checkedScripts[$scriptUrl])) {
                return;
            }
            $i = \random_int(PHP_INT_MIN, PHP_INT_MAX);
            $this->fileGetContents($scriptUrl.'?'.\http_build_query(['c' => $scriptUrl, 'i' => $i]));
            if (!isset(self::$checkedScripts[$scriptUrl]) || self::$checkedScripts[$scriptUrl] !== $i) {
                throw new AssertionError("$scriptUrl is not a valid download script!");
            }
        } finally {
            $lock->release();
        }
    }
}