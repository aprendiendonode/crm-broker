<?php

namespace Modules\Listing\Entities;

use Modules\Sales\Entities\Call;
use App\Models\User;
use App\Models\Agency;
use App\Observers\ListingObserver;
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
        self::observe(ListingObserver::class);
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
        return $this->hasMany(ListingPhoto::class)->where('photo_main', 'yes');
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



    public static function update_validation($request, $id, $listing)
    {


        return [


            "edit_portals_" . $id                                  => ['sometimes', 'nullable', 'array'],







            // "edit_permit_no_" . $id                                => ['sometimes', 'nullable', 'string'],
            // "edit_rera_property_no_status_" . $id                  => ['required', 'in:invalid,valid'],
            // "edit_rera_property_no_log_" . $id                     => ['required', 'numeric'],
            // "edit_rera_property_no_" . $id                         => ['sometimes', 'nullable', 'string'],
            // "edit_rera_property_expiry_date_" . $id                => ['sometimes', 'nullable', 'string', 'date_format:Y-m-d'],




            "edit_note_" . $id                                     => ['sometimes', 'nullable', 'string'],
            "edit_features_" . $id                                 => ['required', 'array'],

            // "edit_video_title_" . $id                              => ['required', 'array'],
            // "edit_video_link_" . $id                               => ['required', 'array'],
            // "edit_video_host_" . $id                               => ['required', 'array'],
            "edit_description_en_" . $id                           => ['sometimes', 'nullable', 'string'],
            "edit_description_ar_" . $id                           => ['sometimes', 'nullable', 'string'],
            "edit_cheque_date_" . $id                              => ['required', 'array'],
            "edit_cheque_amount_" . $id                            => ['required', 'array'],
            "edit_cheque_percentage_" . $id                        => ['required', 'array'],
            // "edit_photos_" . $id                                   => ['sometimes', 'nullable', 'array'],
            // "edit_checked_main_hidden_" . $id                      => ['sometimes', 'nullable', 'array'],

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