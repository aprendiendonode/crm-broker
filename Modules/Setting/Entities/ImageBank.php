<?php

namespace Modules\Setting\Entities;

use App\Models\Agency;
use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\Setting\Entities\ImageBank
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $folder_id
 * @property string|null $dir
 * @property-read \App\Models\Agency|null $agency
 * @property-read \App\Models\Business|null $business
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Setting\Entities\ImageBank[] $folders
 * @property-read int|null $folders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Setting\Entities\Image[] $images
 * @property-read int|null $images_count
 * @property-read \Modules\Setting\Entities\ImageBank|null $parent
 * @property-read \App\Models\User|null $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Setting\Entities\ImageBank onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank whereDir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank whereFolderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\ImageBank whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Setting\Entities\ImageBank withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Setting\Entities\ImageBank withoutTrashed()
 * @mixin \Eloquent
 */
class ImageBank extends Model
{
    use softDeletes;

    protected  $data = [];

    protected $fillable = [
        'name',
        'dir',
        'agency_id',
        'business_id',
        'folder_id',
        'user_id',
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


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Image::class,'bank_id');
    }

    public function folders(){
        return $this->hasMany(ImageBank::class,'folder_id');
    }

    public function parent(){
        return $this->belongsTo(ImageBank::class,'folder_id');
    }


}
