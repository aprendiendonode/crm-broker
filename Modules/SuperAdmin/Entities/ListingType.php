<?php

namespace Modules\SuperAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\SuperAdmin\Entities\ListingType
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $slug
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $type
 * @property string|null $reference
 * @property string|null $furnished_question
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType whereFurnishedQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\ListingType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ListingType extends Model
{

    protected $guarded = [];
}