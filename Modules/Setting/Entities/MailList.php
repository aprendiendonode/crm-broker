<?php

namespace Modules\Setting\Entities;

use App\Models\Agency;
use App\Models\Business;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailList extends Model
{
    use softDeletes;

    protected $fillable = [
        'name_en',
        'name_ar',
        'mails',
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

//    public function contacts(){
//        return $this->belongsToMany(Contact::class, 'contacts_mail_list',
//            'mail_list_id','contact_id');
//    }
}
