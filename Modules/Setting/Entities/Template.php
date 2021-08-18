<?php

namespace Modules\Setting\Entities;

use App\Models\Agency;
use App\Models\Business;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\Setting\Entities\Template
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $type
 * @property string|null $description_en
 * @property string|null $description_ar
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $slug
 * @property string|null $system
 * @property-read \App\Models\Agency|null $agency
 * @property-read \App\Models\Business|null $business
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Setting\Entities\Template onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template whereDescriptionAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template whereSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Template whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Setting\Entities\Template withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Setting\Entities\Template withoutTrashed()
 * @mixin \Eloquent
 */
class Template extends Model
{
    use softDeletes;

    protected $fillable = [
        'title',
        'type',
        'description_en',
        'description_ar',
        'agency_id',
        'business_id',
        'slug',
        'system',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

}
