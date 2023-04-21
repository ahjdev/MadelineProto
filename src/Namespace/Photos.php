<?php declare(strict_types=1);
/**
 * This file is automatic generated by build_docs.php file
 * and is used only for autocomplete in multiple IDE
 * don't modify manually.
 */

namespace danog\MadelineProto\Namespace;

interface Photos
{
    /**
     * Installs a previously uploaded photo as a profile photo.
     *
     * @param array $id Input photo @see https://docs.madelineproto.xyz/API_docs/types/InputPhoto.html
     * @param array|int|string $bot @see https://docs.madelineproto.xyz/API_docs/types/InputUser.html
     * @return array{_: 'photos.photo', photo: array{_: 'photoEmpty', id: int}|array{_: 'photo', has_stickers: bool, id: int, access_hash: int, file_reference: string, date: int, sizes: list<array{_: 'photoSizeEmpty', type: string}|array{_: 'photoSize', type: string, w: int, h: int, size: int}|array{_: 'photoCachedSize', type: string, w: int, h: int, bytes: string}|array{_: 'photoStrippedSize', type: string, bytes: string}|array{_: 'photoSizeProgressive', type: string, w: int, h: int, sizes: list<int>}|array{_: 'photoPathSize', type: string, bytes: string}|array{_: 'photoSize', location: array{_: 'fileLocationUnavailable', volume_id: int, local_id: int, secret: int}|array{_: 'fileLocation', dc_id: int, volume_id: int, local_id: int, secret: int}, type: string, w: int, h: int, size: int}|array{_: 'photoCachedSize', location: array{_: 'fileLocationUnavailable', volume_id: int, local_id: int, secret: int}|array{_: 'fileLocation', dc_id: int, volume_id: int, local_id: int, secret: int}, type: string, w: int, h: int, bytes: string}>, video_sizes: list<array{_: 'videoSize', type: string, w: int, h: int, size: int, video_start_ts?: float}|array{_: 'videoSizeEmojiMarkup', emoji_id: int, background_colors: list<int>}|array{_: 'videoSizeStickerMarkup', stickerset: array{_: 'inputStickerSetEmpty'}|array{_: 'inputStickerSetID', id: int, access_hash: int}|array{_: 'inputStickerSetShortName', short_name: string}|array{_: 'inputStickerSetAnimatedEmoji'}|array{_: 'inputStickerSetDice', emoticon: string}|array{_: 'inputStickerSetAnimatedEmojiAnimations'}|array{_: 'inputStickerSetPremiumGifts'}|array{_: 'inputStickerSetEmojiGenericAnimations'}|array{_: 'inputStickerSetEmojiDefaultStatuses'}|array{_: 'inputStickerSetEmojiDefaultTopicIcons'}, sticker_id: int, background_colors: list<int>}>, dc_id: int}, users: list<array|int|string>} @see https://docs.madelineproto.xyz/API_docs/types/photos.Photo.html
     */
    public function updateProfilePhoto(array $id, bool $fallback = false, array|int|string $bot = []): array;

    /**
     * Updates current user profile photo.
     *
     * @param array|int|string $bot @see https://docs.madelineproto.xyz/API_docs/types/InputUser.html
     * @param mixed $file A file name or a file URL. You can also use amphp async streams, amphp HTTP response objects, and [much more](https://docs.madelineproto.xyz/docs/FILES.html#downloading-files)!
     * @param mixed $video A file name or a file URL. You can also use amphp async streams, amphp HTTP response objects, and [much more](https://docs.madelineproto.xyz/docs/FILES.html#downloading-files)!
     * @param float $video_start_ts Floating point UNIX timestamp in seconds, indicating the frame of the video that should be used as static preview.
     * @param array{_: 'videoSize', type?: string, w?: int, h?: int, size?: int, video_start_ts?: float}|array{_: 'videoSizeEmojiMarkup', emoji_id?: int, background_colors?: list<int>}|array{_: 'videoSizeStickerMarkup', stickerset: array{_: 'inputStickerSetEmpty'}|array{_: 'inputStickerSetID', id?: int, access_hash?: int}|array{_: 'inputStickerSetShortName', short_name?: string}|array{_: 'inputStickerSetAnimatedEmoji'}|array{_: 'inputStickerSetDice', emoticon?: string}|array{_: 'inputStickerSetAnimatedEmojiAnimations'}|array{_: 'inputStickerSetPremiumGifts'}|array{_: 'inputStickerSetEmojiGenericAnimations'}|array{_: 'inputStickerSetEmojiDefaultStatuses'}|array{_: 'inputStickerSetEmojiDefaultTopicIcons'}, sticker_id?: int, background_colors?: list<int>}|array<never, never> $video_emoji_markup @see https://docs.madelineproto.xyz/API_docs/types/VideoSize.html
     * @return array{_: 'photos.photo', photo: array{_: 'photoEmpty', id: int}|array{_: 'photo', has_stickers: bool, id: int, access_hash: int, file_reference: string, date: int, sizes: list<array{_: 'photoSizeEmpty', type: string}|array{_: 'photoSize', type: string, w: int, h: int, size: int}|array{_: 'photoCachedSize', type: string, w: int, h: int, bytes: string}|array{_: 'photoStrippedSize', type: string, bytes: string}|array{_: 'photoSizeProgressive', type: string, w: int, h: int, sizes: list<int>}|array{_: 'photoPathSize', type: string, bytes: string}|array{_: 'photoSize', location: array{_: 'fileLocationUnavailable', volume_id: int, local_id: int, secret: int}|array{_: 'fileLocation', dc_id: int, volume_id: int, local_id: int, secret: int}, type: string, w: int, h: int, size: int}|array{_: 'photoCachedSize', location: array{_: 'fileLocationUnavailable', volume_id: int, local_id: int, secret: int}|array{_: 'fileLocation', dc_id: int, volume_id: int, local_id: int, secret: int}, type: string, w: int, h: int, bytes: string}>, video_sizes: list<array{_: 'videoSize', type: string, w: int, h: int, size: int, video_start_ts?: float}|array{_: 'videoSizeEmojiMarkup', emoji_id: int, background_colors: list<int>}|array{_: 'videoSizeStickerMarkup', stickerset: array{_: 'inputStickerSetEmpty'}|array{_: 'inputStickerSetID', id: int, access_hash: int}|array{_: 'inputStickerSetShortName', short_name: string}|array{_: 'inputStickerSetAnimatedEmoji'}|array{_: 'inputStickerSetDice', emoticon: string}|array{_: 'inputStickerSetAnimatedEmojiAnimations'}|array{_: 'inputStickerSetPremiumGifts'}|array{_: 'inputStickerSetEmojiGenericAnimations'}|array{_: 'inputStickerSetEmojiDefaultStatuses'}|array{_: 'inputStickerSetEmojiDefaultTopicIcons'}, sticker_id: int, background_colors: list<int>}>, dc_id: int}, users: list<array|int|string>} @see https://docs.madelineproto.xyz/API_docs/types/photos.Photo.html
     */
    public function uploadProfilePhoto(bool $fallback = false, array|int|string $bot = [], mixed $file = [], mixed $video = [], float $video_start_ts = 0.0, array $video_emoji_markup = []): array;

    /**
     * Deletes profile photos. The method returns a list of successfully deleted photo IDs.
     *
     * @param list<array>|array<never, never> $id Array of Input photos to delete @see https://docs.madelineproto.xyz/API_docs/types/InputPhoto.html
     * @return list<int>
     */
    public function deletePhotos(array $id = []): array;

    /**
     * Returns the list of user photos.
     *
     * @param array|int|string $user_id User ID @see https://docs.madelineproto.xyz/API_docs/types/InputUser.html
     * @param int $offset Number of list elements to be skipped
     * @param int $max_id If a positive value was transferred, the method will return only photos with IDs less than the set one
     * @param int $limit Number of list elements to be returned
     * @return array{_: 'photos.photos', photos: list<array{_: 'photoEmpty', id: int}|array{_: 'photo', has_stickers: bool, id: int, access_hash: int, file_reference: string, date: int, sizes: list<array{_: 'photoSizeEmpty', type: string}|array{_: 'photoSize', type: string, w: int, h: int, size: int}|array{_: 'photoCachedSize', type: string, w: int, h: int, bytes: string}|array{_: 'photoStrippedSize', type: string, bytes: string}|array{_: 'photoSizeProgressive', type: string, w: int, h: int, sizes: list<int>}|array{_: 'photoPathSize', type: string, bytes: string}|array{_: 'photoSize', location: array{_: 'fileLocationUnavailable', volume_id: int, local_id: int, secret: int}|array{_: 'fileLocation', dc_id: int, volume_id: int, local_id: int, secret: int}, type: string, w: int, h: int, size: int}|array{_: 'photoCachedSize', location: array{_: 'fileLocationUnavailable', volume_id: int, local_id: int, secret: int}|array{_: 'fileLocation', dc_id: int, volume_id: int, local_id: int, secret: int}, type: string, w: int, h: int, bytes: string}>, video_sizes: list<array{_: 'videoSize', type: string, w: int, h: int, size: int, video_start_ts?: float}|array{_: 'videoSizeEmojiMarkup', emoji_id: int, background_colors: list<int>}|array{_: 'videoSizeStickerMarkup', stickerset: array{_: 'inputStickerSetEmpty'}|array{_: 'inputStickerSetID', id: int, access_hash: int}|array{_: 'inputStickerSetShortName', short_name: string}|array{_: 'inputStickerSetAnimatedEmoji'}|array{_: 'inputStickerSetDice', emoticon: string}|array{_: 'inputStickerSetAnimatedEmojiAnimations'}|array{_: 'inputStickerSetPremiumGifts'}|array{_: 'inputStickerSetEmojiGenericAnimations'}|array{_: 'inputStickerSetEmojiDefaultStatuses'}|array{_: 'inputStickerSetEmojiDefaultTopicIcons'}, sticker_id: int, background_colors: list<int>}>, dc_id: int}>, users: list<array|int|string>}|array{_: 'photos.photosSlice', count: int, photos: list<array{_: 'photoEmpty', id: int}|array{_: 'photo', has_stickers: bool, id: int, access_hash: int, file_reference: string, date: int, sizes: list<array{_: 'photoSizeEmpty', type: string}|array{_: 'photoSize', type: string, w: int, h: int, size: int}|array{_: 'photoCachedSize', type: string, w: int, h: int, bytes: string}|array{_: 'photoStrippedSize', type: string, bytes: string}|array{_: 'photoSizeProgressive', type: string, w: int, h: int, sizes: list<int>}|array{_: 'photoPathSize', type: string, bytes: string}|array{_: 'photoSize', location: array{_: 'fileLocationUnavailable', volume_id: int, local_id: int, secret: int}|array{_: 'fileLocation', dc_id: int, volume_id: int, local_id: int, secret: int}, type: string, w: int, h: int, size: int}|array{_: 'photoCachedSize', location: array{_: 'fileLocationUnavailable', volume_id: int, local_id: int, secret: int}|array{_: 'fileLocation', dc_id: int, volume_id: int, local_id: int, secret: int}, type: string, w: int, h: int, bytes: string}>, video_sizes: list<array{_: 'videoSize', type: string, w: int, h: int, size: int, video_start_ts?: float}|array{_: 'videoSizeEmojiMarkup', emoji_id: int, background_colors: list<int>}|array{_: 'videoSizeStickerMarkup', stickerset: array{_: 'inputStickerSetEmpty'}|array{_: 'inputStickerSetID', id: int, access_hash: int}|array{_: 'inputStickerSetShortName', short_name: string}|array{_: 'inputStickerSetAnimatedEmoji'}|array{_: 'inputStickerSetDice', emoticon: string}|array{_: 'inputStickerSetAnimatedEmojiAnimations'}|array{_: 'inputStickerSetPremiumGifts'}|array{_: 'inputStickerSetEmojiGenericAnimations'}|array{_: 'inputStickerSetEmojiDefaultStatuses'}|array{_: 'inputStickerSetEmojiDefaultTopicIcons'}, sticker_id: int, background_colors: list<int>}>, dc_id: int}>, users: list<array|int|string>} @see https://docs.madelineproto.xyz/API_docs/types/photos.Photos.html
     */
    public function getUserPhotos(array|int|string $user_id, int $offset = 0, int $max_id = 0, int $limit = 0): array;

    /**
     *
     *
     * @param array|int|string $user_id @see https://docs.madelineproto.xyz/API_docs/types/InputUser.html
     * @param mixed $file A file name or a file URL. You can also use amphp async streams, amphp HTTP response objects, and [much more](https://docs.madelineproto.xyz/docs/FILES.html#downloading-files)!
     * @param mixed $video A file name or a file URL. You can also use amphp async streams, amphp HTTP response objects, and [much more](https://docs.madelineproto.xyz/docs/FILES.html#downloading-files)!
     * @param array{_: 'videoSize', type?: string, w?: int, h?: int, size?: int, video_start_ts?: float}|array{_: 'videoSizeEmojiMarkup', emoji_id?: int, background_colors?: list<int>}|array{_: 'videoSizeStickerMarkup', stickerset: array{_: 'inputStickerSetEmpty'}|array{_: 'inputStickerSetID', id?: int, access_hash?: int}|array{_: 'inputStickerSetShortName', short_name?: string}|array{_: 'inputStickerSetAnimatedEmoji'}|array{_: 'inputStickerSetDice', emoticon?: string}|array{_: 'inputStickerSetAnimatedEmojiAnimations'}|array{_: 'inputStickerSetPremiumGifts'}|array{_: 'inputStickerSetEmojiGenericAnimations'}|array{_: 'inputStickerSetEmojiDefaultStatuses'}|array{_: 'inputStickerSetEmojiDefaultTopicIcons'}, sticker_id?: int, background_colors?: list<int>}|array<never, never> $video_emoji_markup @see https://docs.madelineproto.xyz/API_docs/types/VideoSize.html
     * @return array{_: 'photos.photo', photo: array{_: 'photoEmpty', id: int}|array{_: 'photo', has_stickers: bool, id: int, access_hash: int, file_reference: string, date: int, sizes: list<array{_: 'photoSizeEmpty', type: string}|array{_: 'photoSize', type: string, w: int, h: int, size: int}|array{_: 'photoCachedSize', type: string, w: int, h: int, bytes: string}|array{_: 'photoStrippedSize', type: string, bytes: string}|array{_: 'photoSizeProgressive', type: string, w: int, h: int, sizes: list<int>}|array{_: 'photoPathSize', type: string, bytes: string}|array{_: 'photoSize', location: array{_: 'fileLocationUnavailable', volume_id: int, local_id: int, secret: int}|array{_: 'fileLocation', dc_id: int, volume_id: int, local_id: int, secret: int}, type: string, w: int, h: int, size: int}|array{_: 'photoCachedSize', location: array{_: 'fileLocationUnavailable', volume_id: int, local_id: int, secret: int}|array{_: 'fileLocation', dc_id: int, volume_id: int, local_id: int, secret: int}, type: string, w: int, h: int, bytes: string}>, video_sizes: list<array{_: 'videoSize', type: string, w: int, h: int, size: int, video_start_ts?: float}|array{_: 'videoSizeEmojiMarkup', emoji_id: int, background_colors: list<int>}|array{_: 'videoSizeStickerMarkup', stickerset: array{_: 'inputStickerSetEmpty'}|array{_: 'inputStickerSetID', id: int, access_hash: int}|array{_: 'inputStickerSetShortName', short_name: string}|array{_: 'inputStickerSetAnimatedEmoji'}|array{_: 'inputStickerSetDice', emoticon: string}|array{_: 'inputStickerSetAnimatedEmojiAnimations'}|array{_: 'inputStickerSetPremiumGifts'}|array{_: 'inputStickerSetEmojiGenericAnimations'}|array{_: 'inputStickerSetEmojiDefaultStatuses'}|array{_: 'inputStickerSetEmojiDefaultTopicIcons'}, sticker_id: int, background_colors: list<int>}>, dc_id: int}, users: list<array|int|string>} @see https://docs.madelineproto.xyz/API_docs/types/photos.Photo.html
     */
    public function uploadContactProfilePhoto(array|int|string $user_id, bool $suggest = false, bool $save = false, mixed $file = [], mixed $video = [], float $video_start_ts = 0.0, array $video_emoji_markup = []): array;
}
