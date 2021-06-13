<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeadType extends Model
{

    protected $guarded = [];

    public function leads()
    {
        return $this->hasMany(Lead::class, 'type_id');
    }
}
