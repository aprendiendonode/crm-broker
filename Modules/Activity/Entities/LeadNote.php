<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Sales\Entities\Lead;
use Illuminate\Database\Eloquent\SoftDeletes;


class LeadNote extends Model
{
    use SoftDeletes;

    protected $table = 'lead_notes';

    protected $fillable = [
        'notes_en',
        'notes_ar',
        'lead_id',
        'add_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function addBy()
    {
        return $this->belongsTo(User::class,'add_by');
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class,'lead_id');
    }
}
