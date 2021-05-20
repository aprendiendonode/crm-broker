<?php

namespace Modules\SuperAdmin\Entities;

use Illuminate\Database\Eloquent\Model;


class Community extends Model
{


    protected $guarded = [];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function sub_communities()
    {
        return $this->hasMany(SubCommunity::class);
    }
}
