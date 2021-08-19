<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Listing\Entities\TemporaryPlan
 *
 * @property int $id
 * @property string|null $folder
 * @property string|null $main
 * @property string|null $title
 * @property string|null $watermark
 * @property string|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryPlan whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryPlan whereFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryPlan whereMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryPlan whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryPlan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryPlan whereWatermark($value)
 * @mixin \Eloquent
 */
class TemporaryPlan extends Model
{
    protected $table = 'temporary_listings_plans';
    protected $guarded = [];
}