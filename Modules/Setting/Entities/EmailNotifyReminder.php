<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class EmailNotifyReminder extends Model
{

    protected $table = 'email_notify_reminders';
    protected $guarded = [];


    public function email_notify()
    {
        return $this->belongsTo(EmailNotify::class,'email_notify_id');
    }
}
