<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $guarded = [];

    public function sender(){
        return $this->belongsTo(Agency::class,'sender_id');
    }

    public function receiver(){
        return $this->belongsTo(Agency::class,'receiver_id');
    }
}
