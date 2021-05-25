<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sales\Entities\Client;


class ClientNote extends Model
{
    use SoftDeletes;

    protected $table = 'client_notes';

    protected $fillable = [
        'notes_en',
        'notes_ar',
        'client_id',
        'add_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function addBy()
    {
        return $this->belongsTo(User::class,'add_by');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
