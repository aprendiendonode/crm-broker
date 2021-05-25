<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = "activity_logs";
    protected $fillable = ['log_en','log_ar','group','group_id','add_by','agency_id','business_id','created_at','updated_at'];

    public function addBy(){

        return $this->belongsTo(User::class,'add_by');
    }
}
