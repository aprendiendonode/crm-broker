<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlackList extends Model
{
    protected $guarded = [];

    public function agency(){
        return $this->belongsTo(Agency::class,'agency_id');
    }

    public function blacklist(){
        return $this->belongsTo(Agency::class,'black_listed_agency_id');
    }
}
