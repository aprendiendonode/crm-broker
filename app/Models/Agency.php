<?php

namespace App\Models;

use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Client;
use Modules\Sales\Entities\LeadType;
use Modules\Listing\Entities\Listing;
use Modules\Sales\Entities\Developer;
use Modules\SuperAdmin\Entities\City;
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

/**
 * App\Models\Agency
 *
 * @property int $id
 * @property string|null $company_name_en
 * @property string|null $company_name_ar
 * @property string|null $company_email
 * @property string|null $description_en
 * @property string|null $description_ar
 * @property string|null $country_code
 * @property string|null $city_code
 * @property string|null $phone
 * @property string|null $cell_code
 * @property string|null $cell
 * @property string|null $website
 * @property string|null $fax_country_code
 * @property string|null $fax_city_code
 * @property string|null $company_fax
 * @property string|null $address
 * @property string|null $trade_license
 * @property string|null $image
 * @property string|null $company_orn
 * @property int|null $country_id
 * @property int|null $city_id
 * @property int|null $owner_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $business_id
 * @property string|null $agency_token
 * @property string|null $currency
 * @property string|null $country_symbol
 * @property string|null $cell_symbol
 * @property int|null $language_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlackList[] $black_listed_from
 * @property-read int|null $black_listed_from_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlackList[] $black_listed_to
 * @property-read int|null $black_listed_to_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\CallStatus[] $call_status
 * @property-read int|null $call_status_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Listing\Entities\ListingCheque[] $cheques
 * @property-read int|null $cheques_count
 * @property-read \Modules\SuperAdmin\Entities\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Modules\SuperAdmin\Entities\Country|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Template[] $descriptionTemplates
 * @property-read int|null $description_templates_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\Developer[] $developers
 * @property-read int|null $developers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Template[] $emailTemplates
 * @property-read int|null $email_templates_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\Client[] $landlords
 * @property-read int|null $landlords_count
 * @property-read \App\Models\Language|null $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\LeadCommunication[] $lead_communications
 * @property-read int|null $lead_communications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\LeadPriority[] $lead_priorities
 * @property-read int|null $lead_priorities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\LeadProperty[] $lead_properties
 * @property-read int|null $lead_properties_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\LeadQualifications[] $lead_qualifications
 * @property-read int|null $lead_qualifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\LeadSource[] $lead_sources
 * @property-read int|null $lead_sources_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\LeadType[] $lead_types
 * @property-read int|null $lead_types_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\Lead[] $leads
 * @property-read int|null $leads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Listing\Entities\ListingView[] $listing_views
 * @property-read int|null $listing_views_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Listing\Entities\Listing[] $listingsAll
 * @property-read int|null $listings_all_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Listing\Entities\Listing[] $listingsArchive
 * @property-read int|null $listings_archive_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Listing\Entities\Listing[] $listingsDraft
 * @property-read int|null $listings_draft_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Listing\Entities\Listing[] $listingsLive
 * @property-read int|null $listings_live_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Listing\Entities\Listing[] $listingsReview
 * @property-read int|null $listings_review_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\Opportunity[] $opportunities
 * @property-read int|null $opportunities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Request[] $receive_requests
 * @property-read int|null $receive_requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Request[] $send_requests
 * @property-read int|null $send_requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Activity\Entities\TaskStatus[] $task_status
 * @property-read int|null $task_status_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Activity\Entities\TaskType[] $task_types
 * @property-read int|null $task_types_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\Client[] $tenants
 * @property-read int|null $tenants_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Agency onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereAgencyToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCellCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCellSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCompanyEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCompanyFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCompanyNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCompanyNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCompanyOrn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCountrySymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereDescriptionAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereFaxCityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereFaxCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereTradeLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agency whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Agency withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Agency withoutTrashed()
 * @mixin \Eloquent
 */
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
        'country_symbol',
        'city_code',
        'phone',
        'cell_code',
        'cell_symbol',
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
        'language_id'
    ];



    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
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
                return $q->where('role', 'landlord');
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