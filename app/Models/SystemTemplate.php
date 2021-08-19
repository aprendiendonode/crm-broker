<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SystemTemplate
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $type
 * @property string|null $description_en
 * @property string|null $description_ar
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemTemplate whereDescriptionAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemTemplate whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemTemplate whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemTemplate whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemTemplate whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemTemplate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SystemTemplate extends Model
{
    protected $guarded = [];
}
