<?php

namespace Modules\SuperAdmin\Entities;

use Illuminate\Database\Eloquent\Model;


class SubCommunity extends Model
{


    protected $guarded = [];
    public function community()
    {
        return $this->belongsTo(Comuunity::class);
    }
}
