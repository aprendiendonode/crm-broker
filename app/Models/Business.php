<?php

namespace App\Models;

use Dirape\Token\DirapeToken;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Business
 *
 * @property int $id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $business_token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereBusinessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Business withToken($flag = true)
 * @mixin \Eloquent
 */
class Business extends Model
{
    use DirapeToken;
    protected $table = 'businesses';
    protected $DT_Column = 'business_token';


    protected $guarded = [];
}
