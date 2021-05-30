<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Activity\Entities\Task;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'email',
        'password',
        'name_en',
        'name_ar',
        'brn',
        'description_en',
        'description_ar',
        'zip',
        'whatsapp',
        'skype',
        'active',
        'country_code',
        'city_code',
        'phone',
        'cell_code',
        'cell',
        'fax_country_code',
        'fax_city_code',
        'staff_fax',
        'address',
        'agency_id',
        'business_id',
        'image',
        'nationality_id',
        'team_id',
        'type',
        'can_access',
        'language',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function nationality()
    {
        return $this->belongsTo(Country::class, 'nationality_id');
    }


    public function business()
    {
        return $this->belongsTo(Business::class);
    }




    public function agencies()
    {
        return $this->hasMany(Agency::class, 'owner_id');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_user', 'staff_id', 'task_id');
    }


    public function getTasksByUserId($agency_id)
    {

        // if user is super admin show all tasks

        //if user is owner of business show tasks related by this business and agency

        if (owner()){

            $tasks = Task::where('business_id',$this->business_id)->where('agency_id',$agency_id);

        }else{

            //if user is stuff show tasks related to you only
//            $tasks = Task::where('agency_id',$this->agency_id)->where('business_id',$this->business_id);
            $tasks = $this->tasks()->where('agency_id',$agency_id);

        }

        return $tasks;
    }
}