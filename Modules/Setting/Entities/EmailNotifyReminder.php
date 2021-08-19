<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Setting\Entities\EmailNotifyReminder
 *
 * @property int $id
 * @property string|null $category
 * @property string|null $type
 * @property string|null $day
 * @property string|null $time
 * @property int|null $email_notify_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Setting\Entities\EmailNotify|null $email_notify
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyReminder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyReminder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyReminder query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyReminder whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyReminder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyReminder whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyReminder whereEmailNotifyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyReminder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyReminder whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyReminder whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyReminder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EmailNotifyReminder extends Model
{

    protected $table = 'email_notify_reminders';
    protected $guarded = [];


    public function email_notify()
    {
        return $this->belongsTo(EmailNotify::class,'email_notify_id');
    }
}
