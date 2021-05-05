<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpportunityStage extends Model
{
    protected $table = 'opportunity_stages';
    protected $guarded = [];
}