<?php

namespace Modules\Sales\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class OpportunityResult extends Model
{
    protected $table = 'opportunity_results';
    protected $guarded = [];


    public function addedBy()
    {
        return $this->belongsTo(User::class,  'added_by', 'id');
    }
}