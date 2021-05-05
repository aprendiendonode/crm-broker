<?php

namespace Modules\Setting\Entities;

use App\Models\Agency;
use App\Models\Business;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailNotify extends Model
{
    use softDeletes;

    protected $fillable = [


        'listing_assigned',
        'lead_assigned',
        'listing_approval',
        'task_assigned',
        'listing_approved',
        'listing_rejected',
        'lsm_lead',
        'email_lead',
        'task_reminder',
        'tenancy_expiry',
        'email_cc',
        'email_bcc',
        'agency_id',
        'business_id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];


    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function reminders(){
        return $this->belongsToMany('contacts_mail_list',
            'email_notifies','email_notify_id');
    }
    public function task_reminders(){
        return $this->hasMany(EmailNotifyReminder::class,'email_notify_id');
    }
    public function tenancy_expiry(){
        return $this->hasMany(EmailNotifyTenancy::class,'email_notify_id');
    }

}
