<?php

namespace Modules\Sales\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientContract extends Model
{
    protected $table = 'client_contracts';
    protected $guarded = [];


    public function documents()
    {
        return $this->hasMany(ContractDocument::class, 'contract_id');
    }
    public function recurrings()
    {
        return $this->hasMany(ContractRecurring::class, 'contract_id');
    }

    public function convertedBy()
    {
        return $this->belongsTo(User::class, 'converted_by');
    }
}