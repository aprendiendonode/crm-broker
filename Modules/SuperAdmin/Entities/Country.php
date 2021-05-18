<?php

namespace Modules\SuperAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{


    public $table = 'countries';



    protected $fillable = [
        'iso2',
        'value',
        'name_en',
        'name_ar',
        'iso3',
        'numcode',
        'un_member',
        'calling_code',
        'cctld',
        'nationality',
        'flag',
        'phone_code',
        'time_zone',
        'created_at',
        'updated_at',
    ];
}
