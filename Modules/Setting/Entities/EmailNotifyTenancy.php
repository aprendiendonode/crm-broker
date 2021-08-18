<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Setting\Entities\EmailNotifyTenancy
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $day
 * @property string|null $time
 * @property int|null $email_notify_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyTenancy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyTenancy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyTenancy query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyTenancy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyTenancy whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyTenancy whereEmailNotifyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyTenancy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyTenancy whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyTenancy whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\EmailNotifyTenancy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EmailNotifyTenancy extends Model
{

    protected $table = 'email_notify_tenancy';
    protected $guarded = [];

}
