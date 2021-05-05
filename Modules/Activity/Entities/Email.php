<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'email_logs';

    protected $fillable = [

        'contacts',
        'email_addresses',
        'BCC',
        'subject',
        'email_content',
        'agency_id',
        'business_id',
        'add_by',
        'attach_file',
        'created_at',
        'updated_at',
        'deleted_at'

    ];

    public function addBy(){

        return $this->belongsTo(User::class,'add_by');
    }
}
