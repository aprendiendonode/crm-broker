<?php

namespace Modules\Sales\Entities;

use App\Models\Agency;
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

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }
}