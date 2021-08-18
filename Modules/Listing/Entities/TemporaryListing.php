<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Listing\Entities\TemporaryListing
 *
 * @property int $id
 * @property string|null $folder
 * @property string|null $main
 * @property string|null $watermark
 * @property string|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $borchure
 * @property string $photo_main
 * @property string|null $icon
 * @property int|null $listing_category_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing whereBorchure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing whereFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing whereListingCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing whereMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing wherePhotoMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryListing whereWatermark($value)
 * @mixin \Eloquent
 */
class TemporaryListing extends Model
{
    protected $table = 'temporary_listings_photos';
    protected $guarded = [];
}