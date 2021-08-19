<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Template
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $type
 * @property string|null $description_en
 * @property string|null $description_ar
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $slug
 * @property string|null $system
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereDescriptionAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Template extends Model
{
    protected $fillable = ['body','name'];


}
