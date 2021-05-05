<?php

namespace Modules\Sales\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class OpportunityQuestion extends Model
{
    protected $table = 'opportunity_questions';
    protected $guarded = [];


    public function addedBy()
    {
        return $this->belongsTo(User::class,  'added_by', 'id');
    }

    public function answeredBy()
    {
        return $this->belongsTo(User::class,  'answered_by', 'id');
    }
}