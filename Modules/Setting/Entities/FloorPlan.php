<?php

namespace Modules\Setting\Entities;

use App\Models\Agency;
use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FloorPlan extends Model
{
    use softDeletes;

    protected $fillable = [
        'image',
        'agency_id',
        'business_id',
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



}
