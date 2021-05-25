<?php

namespace Modules\SuperAdmin\Entities;

use Illuminate\Database\Eloquent\Model;


class SubCommunity extends Model
{

    protected $table = 'sub_communities';


    protected $guarded = [];
    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
