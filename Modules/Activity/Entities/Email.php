<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Activity\Entities\Email
 *
 * @property int $id
 * @property string|null $contacts
 * @property string|null $email_addresses
 * @property string|null $BCC
 * @property string|null $subject
 * @property string|null $email_content
 * @property string|null $attach_file
 * @property int|null $add_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property-read \App\Models\User|null $addBy
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereAddBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereAttachFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereBCC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereContacts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereEmailAddresses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereEmailContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Email whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
