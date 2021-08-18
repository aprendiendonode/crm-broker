<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FaildLead
 *
 * @property int $id
 * @property string|null $failed_data
 * @property string|null $reference
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $agency_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaildLead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaildLead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaildLead query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaildLead whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaildLead whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaildLead whereFailedData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaildLead whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaildLead whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaildLead whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FaildLead extends Model
{
    protected $guarded = [];
}
