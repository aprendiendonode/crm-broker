<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Call extends Model
{

    protected $guarded = [];



    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function madeBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'made_by');
    }
}