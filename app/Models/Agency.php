<?php

namespace App\Models;

use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Client;
use Modules\Sales\Entities\LeadType;
use Modules\Listing\Entities\Listing;
use Modules\Sales\Entities\Developer;
use Modules\Sales\Entities\CallStatus;
use Modules\Sales\Entities\LeadSource;
use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Entities\TaskType;
use Modules\Sales\Entities\Opportunity;
use Modules\Sales\Entities\LeadPriority;
use Modules\Sales\Entities\LeadProperty;
use Modules\SuperAdmin\Entities\Country;
use Modules\Activity\Entities\TaskStatus;
use Modules\Listing\Entities\ListingView;
use Modules\Listing\Entities\ListingCheque;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sales\Entities\LeadCommunication;
use Modules\Sales\Entities\LeadQualifications;

class Agency extends Model
{
    use SoftDeletes;



    protected $fillable = [
        'company_name_en',
        'company_name_ar',
        'company_email',
        'description_en',
        'description_ar',
        'country_code',
        'city_code',
        'phone',
        'cell_code',
        'cell',
        'website',
        'fax_country_code',
        'fax_city_code',
        'company_fax',
        'address',
        'trade_license',
        'image',
        'company_orn',
        'country_id',
        'city_id',
        'deleted_at',
        'created_at',
        'updated_at',
        'business_id',
        'agency_token',
        'currency',
    ];



    public function country()
    {
        return $this->belongsTo(Country::class);
    }


    public function city()
    {
        return $this->belongsTo(City::class);
    }



    public function lead_sources()
    {
        return $this->hasMany(LeadSource::class);
    }

    public function lead_types()
    {
        return $this->hasMany(LeadType::class);
    }

    public function lead_qualifications()
    {
        return $this->hasMany(LeadQualifications::class);
    }
    public function lead_priorities()
    {
        return $this->hasMany(LeadPriority::class);
    }

    public function lead_properties()
    {
        return $this->hasMany(LeadProperty::class);
    }

    public function lead_communications()
    {
        return $this->hasMany(LeadCommunication::class);
    }

    public function task_status()
    {
        return $this->hasMany(TaskStatus::class);
    }

    public function task_types()
    {
        return $this->hasMany(TaskType::class);
    }

    public function call_status()
    {
        return $this->hasMany(CallStatus::class);
    }
    public function listing_views()
    {
        return $this->hasMany(ListingView::class);
    }
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }
    public function listingsAll()
    {
        return $this->hasMany(Listing::class);
    }
    public function listingsLive()
    {
        return $this->hasMany(Listing::class)->where('status', 'live');
    }
    public function listingsArchive()
    {
        return $this->hasMany(Listing::class)->where('status', 'archive');
    }
    public function listingsDraft()
    {
        return $this->hasMany(Listing::class)->where('status', 'draft');
    }
    public function listingsReview()
    {
        return $this->hasMany(Listing::class)->where('status', 'review');
    }
    public function developers()
    {
        return $this->hasMany(Developer::class);
    }
    public function cheques()
    {
        return $this->hasMany(ListingCheque::class);
    }
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    public function tenants()
    {
        return $this->hasMany(Client::class)
            ->whereHas('type', function ($q) {
                return $q->where('role', 'tenant');
            });
    }
    public function landlords()
    {
        return $this->hasMany(Client::class)
            ->whereHas('type', function ($q) {
                return $q->where('role', 'seller');
            });
    }

    public function send_requests()
    {
        return $this->hasMany(Request::class, 'sender_id');
    }

    public function receive_requests()
    {
        return $this->hasMany(Request::class, 'receiver_id');
    }

    public function black_listed_to()
    {
        return $this->hasMany(BlackList::class, 'black_listed_agency_id');
    }

    public function black_listed_from()
    {
        return $this->hasMany(BlackList::class, 'agency_id');
    }
    public function descriptionTemplates()
    {
        return $this->hasMany(Template::class, 'agency_id')->where('type', 'description');
    }
    public function emailTemplates()
    {
        return $this->hasMany(Template::class, 'agency_id')->where('type', 'email');
    }
}
