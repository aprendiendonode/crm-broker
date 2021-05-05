<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name_en', 'name_ar', 'agency_id', 'business_id'];

    public function members()
    {
        return $this->hasMany(User::class, 'team_id');
    }
}