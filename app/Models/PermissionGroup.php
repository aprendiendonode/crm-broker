<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

/**
 * App\Models\PermissionGroup
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PermissionGroup extends Model
{
    protected $guarded = [];

    public function permissions() {
        return $this->hasMany(Permission::class);
    }

}
