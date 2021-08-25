<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ListingData extends DataTransferObject
{

    public  $business_id;
    public  $agency_id;
    public  $type_id;
    public  $loc_lat;
    public  $loc_lng;
    public  $purpose;
    public  $location;
    public  $city_id;
    public  $community_id;
    public  $sub_community_id;
    public  $unit_no;
    public  $plot_no;
    public  $street_no;
    public  $portals;
    public  $view_ids;
    public  $price;
    public  $rent_frequency;
    public  $comission_percent;
    public  $comission_value;
    public  $never_lived_in;
    public  $featured_on_company_website;
    public  $exclusive_rights;
    public  $beds;
    public  $baths;
    public  $parkings;
    public  $year_built;
    public  $developer_id;
    public  $plot_area;
    public  $area;
    public  $deposite_percent;
    public  $deposite_value;
    public  $listing_rent_cheque_id;
    public  $title;
    public  $title_localized;
    public  $lsm;
    public  $landlord_id;
    public  $rented;
    public  $tenancy_contract_start_date;
    public  $tenancy_contract_end_date;
    public  $tenant_id;
    public  $source_id;
    public  $assigned_to;
    public  $status;
    public  $note;
    public  $features;
    public  $key_location;
    public  $govfield1;
    public  $govfield2;
    public  $yearly_service_charges;
    public  $monthly_cooling_charges;
    public  $monthly_cooling_provider;

    public  $description_en;
    public  $description_ar;
    public  $cheque_date;
    public  $cheque_amount;
    public  $cheque_percentage;
    public  $photos;
    public  $video_title;
    public  $video_link;
    public  $video_host;
    public  $documents;
    public  $floor_plans;



    public static function  fromRequest(Request $request): self
    {

        return new self([

            "business_id"                              => $request->business_id,
            "agency_id"                                => $request->agency_id,
            "type_id"                                  => $request->type_id,
            "loc_lat"                                  => $request->loc_lat,
            "loc_lng"                                  => $request->loc_lng,
            "purpose"                                  => $request->purpose,
            "location"                                 => $request->location,
            "city_id"                                  => $request->city_id,
            "community_id"                             => $request->community_id,
            "sub_community_id"                         => $request->sub_community_id,
            "unit_no"                                  => $request->unit_no,
            "plot_no"                                  => $request->plot_no,
            "street_no"                                => $request->street_no,
            "portals"                                  => $request->portals,
            "view_ids"                                 => $request->view_ids,
            "price"                                    => $request->price,
            "rent_frequency"                           => $request->rent_frequency,
            "comission_percent"                        => $request->comission_percent,
            "comission_value"                          => $request->comission_value,
            "never_lived_in"                           => $request->never_lived_in,
            "featured_on_company_website"              => $request->featured_on_company_website,
            "exclusive_rights"                         => $request->exclusive_rights,
            "beds"                                     => $request->beds,
            "baths"                                    => $request->baths,
            "parkings"                                 => $request->parkings,
            "year_built"                               => $request->year_built,
            "developer_id"                             => $request->developer_id,
            "plot_area"                                => $request->plot_area,
            "area"                                     => $request->area,
            "deposite_percent"                         => $request->deposite_percent,
            "deposite_value"                           => $request->deposite_value,
            "listing_rent_cheque_id"                   => $request->listing_rent_cheque_id,
            "title"                                    => $request->title,
            "title_localized"                          => $request->title_localized,
            "lsm"                                      => $request->lsm,
            "landlord_id"                              => $request->landlord_id,
            "rented"                                   => $request->rented,
            "tenancy_contract_start_date"              => $request->tenancy_contract_start_date,
            "tenancy_contract_end_date"                => $request->tenancy_contract_end_date,
            "tenant_id"                                => $request->tenant_id,
            "source_id"                                => $request->source_id,
            "assigned_to"                              => $request->assigned_to,
            "status"                                   => $request->status,
            "note"                                     => $request->note,
            "features"                                 => $request->features,
            "key_location"                             => $request->key_location,
            "govfield1"                                => $request->govfield1,
            "govfield2"                                => $request->govfield2,
            "yearly_service_charges"                   => $request->yearly_service_charges,
            "monthly_cooling_charges"                  => $request->monthly_cooling_charges,
            "monthly_cooling_provider"                 => $request->monthly_cooling_provider,
            "description_en"                           => $request->description_en,
            "description_ar"                           => $request->description_ar,
            'video_title'                              => $request->video_title,
            'video_link'                               => $request->video_link,
            'video_host'                               => $request->video_host,
            'cheque_date'                              => $request->cheque_date,
            'cheque_amount'                            => $request->cheque_amount,
            'cheque_percentage'                        => $request->cheque_percentage,
            'documents'                                => $request->documents,
            'floor_plans'                              => $request->floor_plans,
            'photos'                                   => $request->photos,


        ]);
    }
}