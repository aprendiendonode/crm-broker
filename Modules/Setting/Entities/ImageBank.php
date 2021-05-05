<?php

namespace Modules\Setting\Entities;

use App\Models\Agency;
use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
