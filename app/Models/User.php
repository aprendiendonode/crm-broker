<?php

namespace App\Models;

use Modules\Activity\Entities\Task;
use Modules\Listing\Entities\Listing;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Modules\SuperAdmin\Entities\Country;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $brn
 * @property string|null $description_en
 * @property string|null $zip
 * @property string|null $whatsapp
 * @property string|null $skype
 * @property string|null $active
 * @property string|null $type
 * @property int|null $business_id
 * @property string|null $country_code
 * @property string|null $city_code
 * @property string|null $phone
 * @property string|null $cell_code
 * @property string|null $cell
 * @property string|null $fax_country_code
 * @property string|null $fax_city_code
 * @property string|null $staff_fax
 * @property string|null $address
 * @property string|null $image
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $nationality_id
 * @property int|null $agency_id
 * @property int|null $team_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $can_access
 * @property string|null $description_ar
 * @property string|null $language
 * @property string $default_mode
 * @property string $default_width
 * @property string $default_position
 * @property string $default_sidebar_color
 * @property string $default_sidebar_size
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Agency[] $agencies
 * @property-read int|null $agencies_count
 * @property-read \App\Models\Agency|null $agency
 * @property-read \App\Models\Business|null $business
 * @property-read \Modules\SuperAdmin\Entities\Country|null $nationality
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Activity\Entities\Task[] $tasks
 * @property-read int|null $tasks_count
 * @property-read \App\Models\Team|null $team
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBrn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCanAccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCellCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDefaultMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDefaultPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDefaultSidebarColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDefaultSidebarSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDefaultWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDescriptionAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFaxCityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFaxCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereNationalityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSkype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereStaffFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereWhatsapp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereZip($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

        if (owner()) {

            $tasks = Task::where('business_id', $this->business_id)->where('agency_id', $agency_id);
        } else {

            //if user is stuff show tasks related to you only
            //            $tasks = Task::where('agency_id',$this->agency_id)->where('business_id',$this->business_id);
            $tasks = $this->tasks()->where('business_id', $this->business_id)->where('agency_id', $agency_id);
        }

        return $tasks;
    }

    public function listings()
    {
        return $this->hasMany(Listing::class,'assigned_to');
    }
}
