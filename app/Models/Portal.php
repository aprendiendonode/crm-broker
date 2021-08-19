<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Portal
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Portal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Portal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Portal query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Portal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Portal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Portal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Portal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Portal extends Model
{
    protected $fillable = ['name'];





}
