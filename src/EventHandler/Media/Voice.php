<?php declare(strict_types=1);

namespace danog\MadelineProto\EventHandler\Media;

use danog\MadelineProto\MTProto;

/**
 * Represents a voice message.
 */
final class Voice extends AbstractAudio
{
    /**
     * 100 values from 0 to 31, representing a waveform.
     *
     * @var list<int<0, 31>>|null
     */
    public readonly ?array $waveform;

    /** @internal */
    public function __construct(
        MTProto $API,
        array $rawMedia,
        array $audioAttribute
    ) {
        parent::__construct($API, $rawMedia, $audioAttribute);
        $this->waveform = $audioAttribute['waveform'];
    }
}