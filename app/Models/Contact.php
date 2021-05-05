<?php

namespace App\Models;

use App\Models\Agency;
use App\Models\Business;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use softDeletes;

    protected $fillable = [
        'name_en',
        'name_ar',
        'agency_id',
        'business_id',
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
