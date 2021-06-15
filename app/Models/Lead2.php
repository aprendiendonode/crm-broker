<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Activity\Entities\Task;

class Lead2 extends Model
{
    protected $connection = 'mysql2';
    protected $table = "tbl_leads";
    protected $guarded = [];

    public function source()
    {
        return $this->belongsTo(LeadSource::class);
    }

    public function type()
    {
        return $this->belongsTo(LeadType::class);
    }

    public function qualification()
    {
        return $this->belongsTo(LeadQualifications::class);
    }

    public function calls()
    {
        return $this->hasMany(Call::class, 'module_id')->where('module', 'lead');
    }


    public function tasks()
    {
        return $this->hasMany(Task::class, 'module_id')->where('module', 'lead');
    }
}
