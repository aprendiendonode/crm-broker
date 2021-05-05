<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

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
