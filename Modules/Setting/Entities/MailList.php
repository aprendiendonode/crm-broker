<?php

namespace Modules\Setting\Entities;

use App\Models\Agency;
use App\Models\Business;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\Setting\Entities\MailList
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $mails
 * @property-read \App\Models\Agency|null $agency
 * @property-read \App\Models\Business|null $business
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\MailList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\MailList newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Setting\Entities\MailList onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\MailList query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\MailList whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\MailList whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\MailList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\MailList whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\MailList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\MailList whereMails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\MailList whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\MailList whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\MailList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Setting\Entities\MailList withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Setting\Entities\MailList withoutTrashed()
 * @mixin \Eloquent
 */
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
