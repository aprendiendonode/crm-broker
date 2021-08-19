<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Listing\Entities\ListingPhoto
 *
 * @property int $id
 * @property int|null $listing_id
 * @property string|null $main
 * @property string|null $watermark
 * @property string|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $main_photo
 * @property string|null $borchure
 * @property string $photo_main
 * @property string|null $icon
 * @property int|null $listing_category_id
 * @property-read \Modules\Listing\Entities\Listing|null $listing
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto whereBorchure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto whereListingCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto whereMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto whereMainPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto wherePhotoMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPhoto whereWatermark($value)
 * @mixin \Eloquent
 */
class ListingPhoto extends Model
{

    protected $guarded = [];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
