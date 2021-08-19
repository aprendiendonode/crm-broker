<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Setting\Entities\Image
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $dir
 * @property int|null $bank_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Setting\Entities\ImageBank|null $bank
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Image whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Image whereDir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Image whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Image extends Model
{

    protected $table = 'bank_images';
    protected $fillable = [
        'image',
        'dir',
        'bank_id',
        'created_at',
        'updated_at'
    ];


    public function bank()
    {
        return $this->belongsTo(ImageBank::class);
    }


}
