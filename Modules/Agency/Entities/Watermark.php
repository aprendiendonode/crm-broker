<?php

namespace Modules\Agency\Entities;

use App\Models\Agency;
use App\Models\Business;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Agency\Entities\Watermark
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $name
 * @property int|null $transparent
 * @property string|null $active
 * @property string|null $update_listing
 * @property string|null $current
 * @property string|null $position
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $main_image
 * @property string|null $width
 * @property string|null $height
 * @property-read \App\Models\Agency|null $agency
 * @property-read \App\Models\Business|null $business
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereMainImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereTransparent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereUpdateListing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Agency\Entities\Watermark whereWidth($value)
 * @mixin \Eloquent
 */
class Watermark extends Model
{
    protected $guarded = [];


    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }


}
