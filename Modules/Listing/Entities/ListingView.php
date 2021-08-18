<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Listing\Entities\ListingView
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $slug
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingView query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingView whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingView whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingView whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingView whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingView whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingView whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingView whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ListingView extends Model
{

    protected $guarded = [];
}
