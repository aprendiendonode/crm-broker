<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{


    protected $fillable = [
        'name_en',
        'name_ar',
        'country_id',
        'created_at',
        'updated_at',
    ];



    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}