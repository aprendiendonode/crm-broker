<?php

namespace App\Models;

use Dirape\Token\DirapeToken;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use DirapeToken;
    protected $table = 'businesses';
    protected $DT_Column = 'business_token';


    protected $guarded = [];
}
