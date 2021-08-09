<?php

namespace Modules\Listing\Entities;

use App\Models\User;
use App\Models\Agency;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Validation\Rule;
use Modules\Activity\Entities\Task;
use Modules\Sales\Entities\Developer;
use Modules\SuperAdmin\Entities\City;
use Spatie\MediaLibrary\Models\Media;
use Modules\Sales\Entities\LeadSource;
use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Entities\ListingNote;
use Modules\SuperAdmin\Entities\Community;

use Spatie\MediaLibrary\HasMedia\HasMedia;

use Modules\SuperAdmin\Entities\ListingType;
use Modules\SuperAdmin\Entities\SubCommunity;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Listing extends Model implements Feedable, HasMedia
{
    use HasMediaTrait;

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create([
            'id'      => $this->id,
            'title'   => $this->type->name_en,
            'type'    => $this->type ? $this->type->name_en : '',
            'ad_type' => $this->purpose,
            'price'   => $this->price,
            'summary' => $this->city,
            'updated' => $this->created_at,
            'link'    => $this->location,
            'author'  => $this->location,
        ]);
    }


    public static function getFeedItems()
    {
        return Listing::where('agency_id', request('u'))->get();
    }


    protected $guarded = [];




    public static function boot()
    {
        Parent::boot();
        self::creating(function (Listing $listing) {
            $last_listing      = Listing::where('agency_id', $listing->agency_id)->latest()->first();
            $listing_last_ref  = $last_listing  ? $last_listing->ref_id + 1 :  1;
            $listing->ref_id   = $listing_last_ref;
            $type_reference    = ListingType::where('id', $listing->type_id)->firstOrFail();
            $rent_or_sale      = $listing->purpose == 'sale' ? 'S' : 'R';

            $listing_reference = $listing->agency_id . '-' . $type_reference->reference . '-' . $rent_or_sale . '-' . $listing->ref_id;

            $listing->listing_ref = $listing_reference;
        });
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'module_id')->where('module', 'listing');
    }
    public function notes()
    {
        return $this->hasMany(ListingNote::class);
    }

    public function calls()
    {
        return $this->hasMany(Call::class, 'module_id')->where('module', 'listing');
    }
    public function type()
    {
        return $this->belongsTo(ListingType::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function community()
    {
        return $this->belongsTo(Community::class, 'community_id');
    }
    public function subCommunity()
    {
        return $this->belongsTo(SubCommunity::class, 'sub_community_id');
    }

    public function source()
    {
        return $this->belongsTo(LeadSource::class, 'source_id');
    }
    public function videos()
    {
        return $this->hasMany(ListingVideo::class);
    }
    public function photos()
    {
        return $this->hasMany(ListingPhoto::class);
    }
    public function photo_main()
    {
        return $this->hasOne(ListingPhoto::class)->where('photo_main','yes');
    }
    public function documents()
    {
        return $this->hasMany(ListingDocument::class);
    }
    public function plans()
    {
        return $this->hasMany(ListingPlan::class);
    }
    public function cheques()
    {
        return $this->hasMany(ListingChequeCalculator::class);
    }
    public function cheque_type()
    {
        return $this->belongsTo(ListingCheque::class, 'listing_rent_cheque_id');
    }
    public function view()
    {
        return $this->belongsTo(ListingView::class);
    }
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function portalsList()
    {
        return $this->hasMany(PortalListing::class, 'listing_id');
    }





    public static function store_validation($request)
    {

        return [

            "type_id" => [
                'required', 'integer', Rule::exists('listing_types', 'id')

            ],

            "loc_lat"                                  => ['sometimes', 'nullable', 'string'],
            "loc_lng"                                  => ['sometimes', 'nullable', 'string'],
            "agency_id"                                => ['required'],
            "business_id"                              => ['required'],
            "purpose"                                  => ['required', 'in:sale,rent,short'],
            "location"                                 => ['sometimes', 'nullable', 'string'],
            "city_id"                                  => ['required', 'string'],
            "community_id"                                => ['required', 'string'],
            "sub_community_id"                            => ['sometimes', 'nullable', 'string'],
            "unit_no"                                  => ['sometimes', 'nullable', 'string'],
            "plot_no"                                  => ['sometimes', 'nullable', 'string'],
            "street_no"                                => ['sometimes', 'nullable', 'string'],
            "portals"                                  => ['sometimes', 'nullable', 'array'],
            "view_ids"                                  => ['sometimes', 'nullable', 'array'],
            "view_ids.*"                                => ['sometimes', 'nullable', Rule::exists('listing_views', 'id')->where(function ($q) use ($request) {
                $q->where('agency_id', $request->agency_id);
            })],
            "price"                                    => ['required', 'string'],
            "rent_frequency"                           => ['sometimes', 'nullable', 'string', 'in:yearly,monthly,weekly,daily'],
            "comission_percent"                        => ['sometimes', 'nullable', 'numeric'],
            "comission_value"                          => ['sometimes', 'nullable', 'string'],
            "never_lived_in"                           => ['sometimes', 'nullable', 'in:yes,no'],
            "featured_on_company_website"              => ['sometimes', 'nullable', 'in:yes,no'],
            "exclusive_rights"                         => ['sometimes', 'nullable', 'in:yes,no'],
            "beds"                                     => ['sometimes', 'nullable', 'string'],
            "baths"                                    => ['sometimes', 'nullable', 'integer'],
            "parkings"                                 => ['sometimes', 'nullable', 'integer'],
            "year_built"                               => ['sometimes', 'nullable', 'integer'],
            "developer_id"                             => ['sometimes', 'nullable', Rule::exists('developers', 'id')->where(function ($q) use ($request) {
                $q->where('agency_id', $request->agency_id);
            })],
            "plot_area"                                => ['sometimes', 'nullable', 'numeric'],
            "area"                                     => ['required', 'numeric'],

            "deposite_percent"                         => ['sometimes', 'nullable', 'numeric'],
            "deposite_value"                           => ['sometimes', 'nullable', 'string'],
            "listing_rent_cheque_id"                   => ['sometimes', 'nullable', Rule::exists('listing_rent_cheques', 'id')->where(function ($q) use ($request) {
                $q->where('agency_id', $request->agency_id);
            })],
            "title"                                    => ['sometimes', 'nullable', 'string'],
            "lsm"                                      => ['required', 'in:private,shared'],
            // "permit_no"                                => ['sometimes', 'nullable', 'string'],
            // "rera_property_no_status"                  => ['required', 'in:invalid,valid'],
            // "rera_property_no_log"                     => ['required', 'numeric'],
            // "rera_property_no"                         => ['sometimes', 'nullable', 'string'],
            // "rera_property_expiry_date"                => ['sometimes', 'nullable', 'string', 'date_format:Y-m-d'],
            "landlord_id"                              => ['sometimes', 'nullable', Rule::exists('clients', 'id')->where(function ($q) use ($request) {
                $q->where('agency_id', $request->agency_id);
            })],
            "rented"                                   => ['required', 'in:yes,no'],
            "tenancy_contract_start_date"              => ['sometimes', 'nullable', 'string', 'before_or_equal:tenancy_contract_end_date', 'date_format:Y-m-d'],
            "tenancy_contract_end_date"                => ['sometimes', 'nullable', 'string', 'after_or_equal:tenancy_contract_start_date', 'date_format:Y-m-d'],
            "tenant_id"                                => ['sometimes', 'nullable', Rule::exists('clients', 'id')->where(function ($q) use ($request) {
                $q->where('agency_id', $request->agency_id);
            })],
            "source_id"                                => ['required', Rule::exists('lead_sources', 'id')->where(function ($q) use ($request) {
                $q->where('agency_id', $request->agency_id);
            })],
            "assigned_to"                              => ['required', Rule::exists('users', 'id')->where(function ($q) use ($request) {
                $q->where('business_id', $request->business_id);
            })],
            "status"                                   => ['required', 'in:draft,live,archive,review'],
            "note"                                     => ['sometimes', 'nullable', 'string'],
            "features"                                 => ['required', 'array'],
            "key_location"                             => ['sometimes', 'nullable', 'string'],
            "govfield1"                                => ['sometimes', 'nullable', 'string'],
            "govfield2"                                => ['sometimes', 'nullable', 'string'],
            "yearly_service_charges"                   => ['sometimes', 'nullable', 'numeric'],
            "monthly_cooling_charges"                  => ['sometimes', 'nullable', 'numeric'],
            "monthly_cooling_provider"                 => ['sometimes', 'nullable', 'numeric'],

            "video_title"                              => ['required', 'array'],
            "video_link"                               => ['required', 'array'],
            "video_host"                               => ['required', 'array'],
            "description_en"                           => ['sometimes', 'nullable', 'string'],
            "description_ar"                           => ['sometimes', 'nullable', 'string'],
            "cheque_date"                              => ['required', 'array'],
            "cheque_amount"                            => ['required', 'array'],
            "cheque_percentage"                        => ['required', 'array'],
            "photos"                                   => ['sometimes', 'nullable', 'array'],




            // |regex:/^([0-9\s\-\+\(\)]*)$/



        ];
    }
    public static function update_validation($request, $id, $listing)
    {


        return [

            "edit_type_id_" . $id => [
                'required', 'integer', Rule::exists('listing_types', 'id')
            ],



            "edit_purpose_" . $id                                  => ['required', 'in:sale,rent,short'],

            "edit_portals_" . $id                                  => ['sometimes', 'nullable', 'array'],
            "edit_view_ids_" . $id                                 => ['sometimes', 'nullable', 'array'],
            "edit_view_ids_" . $id . ".*"                          => ['sometimes', 'nullable', Rule::exists('listing_views', 'id')->where(function ($q) use ($request, $listing) {
                $q->where('agency_id', $listing->agency_id);
            })],


            "edit_never_lived_in_" . $id                           => ['sometimes', 'nullable', 'in:yes,no'],
            "edit_featured_on_company_website_" . $id              => ['sometimes', 'nullable', 'in:yes,no'],
            "edit_exclusive_rights_" . $id                         => ['sometimes', 'nullable', 'in:yes,no'],
            "edit_beds_" . $id                                     => ['sometimes', 'nullable', 'string'],
            "edit_baths_" . $id                                    => ['sometimes', 'nullable', 'integer'],
            "edit_parkings_" . $id                                 => ['sometimes', 'nullable', 'integer'],
            "edit_year_built_" . $id                               => ['sometimes', 'nullable', 'integer'],
            "edit_developer_id_" . $id                             => ['sometimes', 'nullable', Rule::exists('developers', 'id')->where(function ($q) use ($request, $listing) {
                $q->where('agency_id', $listing->agency_id);
            })],
            "edit_plot_area_" . $id                                => ['sometimes', 'nullable', 'numeric'],
            "edit_area_" . $id                                     => ['required', 'numeric'],

            "edit_title_" . $id                                    => ['sometimes', 'nullable', 'string'],
            "edit_lsm_" . $id                                      => ['required', 'in:private,shared'],
            // "edit_permit_no_" . $id                                => ['sometimes', 'nullable', 'string'],
            // "edit_rera_property_no_status_" . $id                  => ['required', 'in:invalid,valid'],
            // "edit_rera_property_no_log_" . $id                     => ['required', 'numeric'],
            // "edit_rera_property_no_" . $id                         => ['sometimes', 'nullable', 'string'],
            // "edit_rera_property_expiry_date_" . $id                => ['sometimes', 'nullable', 'string', 'date_format:Y-m-d'],
            "edit_landlord_id_" . $id                              => ['sometimes', 'nullable', Rule::exists('clients', 'id')->where(function ($q) use ($request, $listing) {
                $q->where('agency_id', $listing->agency_id);
            })],
            "edit_rented_" . $id                                   => ['required', 'in:yes,no'],
            "edit_tenancy_contract_start_date_" . $id              => ['sometimes', 'nullable',  "before_or_equal:edit_tenancy_contract_end_date_{$id}", 'date_format:Y-m-d'],
            "edit_tenancy_contract_end_date_" . $id                => ['sometimes', 'nullable',  "after_or_equal:edit_tenancy_contract_start_date_{$id}", 'date_format:Y-m-d'],
            "edit_tenant_id_" . $id                                => ['sometimes', 'nullable', Rule::exists('clients', 'id')->where(function ($q) use ($request, $listing) {
                $q->where('agency_id', $listing->agency_id);
            })],
            "edit_source_id_" . $id                                => ['required', Rule::exists('lead_sources', 'id')->where(function ($q) use ($request, $listing) {
                $q->where('agency_id', $listing->agency_id);
            })],

            "edit_status_" . $id                                   => ['required', 'in:draft,live,archive,review'],
            "edit_note_" . $id                                     => ['sometimes', 'nullable', 'string'],
            "edit_features_" . $id                                 => ['required', 'array'],
            "edit_key_location_" . $id                             => ['sometimes', 'nullable', 'string'],
            "edit_govfield1_" . $id                                => ['sometimes', 'nullable', 'string'],
            "edit_govfield2_" . $id                                => ['sometimes', 'nullable', 'string'],
            "edit_yearly_service_charges_" . $id                   => ['sometimes', 'nullable', 'numeric'],
            "edit_monthly_cooling_charges_" . $id                  => ['sometimes', 'nullable', 'numeric'],
            "edit_monthly_cooling_provider_" . $id                 => ['sometimes', 'nullable', 'numeric'],

            "edit_video_title_" . $id                              => ['required', 'array'],
            "edit_video_link_" . $id                               => ['required', 'array'],
            "edit_video_host_" . $id                               => ['required', 'array'],
            "edit_description_en_" . $id                           => ['sometimes', 'nullable', 'string'],
            "edit_description_ar_" . $id                           => ['sometimes', 'nullable', 'string'],
            "edit_cheque_date_" . $id                              => ['required', 'array'],
            "edit_cheque_amount_" . $id                            => ['required', 'array'],
            "edit_cheque_percentage_" . $id                        => ['required', 'array'],
            "edit_photos_" . $id                                   => ['sometimes', 'nullable', 'array'],
            "edit_checked_main_hidden_" . $id                      => ['sometimes', 'nullable', 'array'],

            // |regex:/^([0-9\s\-\+\(\)]*)$/

        ];
    }

    public function getFeaturesAttribute($value)
    {
        return json_decode($value);
    }
    public function getViewIdsAttribute($value)
    {
        return json_decode($value);
    }
    public function getPortalsAttribute($value)
    {
        return json_decode($value);
    }



    public function setFeaturesAttribute($value)
    {
        $this->attributes['features'] = json_encode($value);
    }

    public function setViewIdsAttribute($value)
    {
        $this->attributes['view_ids'] =  json_encode($value);
    }
    public function setPortalsAttribute($value)
    {
        $this->attributes['portals'] = json_encode($value);
    }
}
