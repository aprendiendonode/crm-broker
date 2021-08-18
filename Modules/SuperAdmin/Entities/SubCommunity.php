<?php

namespace Modules\SuperAdmin\Entities;

use Illuminate\Database\Eloquent\Model;


/**
 * Modules\SuperAdmin\Entities\SubCommunity
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property int|null $community_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $country_id
 * @property-read \Modules\SuperAdmin\Entities\Community|null $community
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\SubCommunity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\SubCommunity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\SubCommunity query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\SubCommunity whereCommunityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\SubCommunity whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\SubCommunity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\SubCommunity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\SubCommunity whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\SubCommunity whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\SubCommunity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SubCommunity extends Model
{

    protected $table = 'sub_communities';


    protected $guarded = [];
    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
