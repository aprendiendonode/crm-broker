<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sales\Entities\Opportunity;

class OpportunityNote extends Model
{
    use SoftDeletes;

    protected $table = 'opportunity_notes';

    protected $fillable = [
        'notes_en',
        'notes_ar',
        'opportunity_id',
        'add_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function addBy()
    {
        return $this->belongsTo(User::class,'add_by');
    }

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class,'opportunity_id');
    }
}
