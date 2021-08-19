<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ListingUpdateDetailsData extends DataTransferObject
{

    public        $listing;
    public        $business;
    public        $agency;
    public        $purpose;
    public        $status;
    public        $lsm;
    public        $title;
    public        $type;
    public        $beds;
    public        $parkings;
    public        $baths;
    public        $year_built;
    public        $plot_area;
    public        $area;
    public        $source;
    public        $landlord;
    public        $developer;
    public        $rented;
    public        $never_lived_in;
    public        $featured_on_company_website;
    public        $exclusive_rights;
    public        $tenant_start_date;
    public        $tenant_end_date;
    public        $tenant;
    public        $views;
    public static function fromRequest(Request $request): self
    {

        return new self([
            'listing'        => $request->listing,
            'business'       => $request->business,
            'agency'         => $request->agency,
            'purpose'        => $request->purpose,
            'status'         => $request->status,
            'lsm'            => $request->lsm,
            'title'          => $request->title,
            'type'           => $request->type,
            'beds'           => $request->beds,
            'parkings'       => $request->parkings,
            'baths'          => $request->baths,
            'year_built'     => $request->year_built,
            'plot_area'      => $request->plot_area,
            'area'           => $request->area,
            'source'         => $request->sources,
            'landlord'       => $request->landlord,
            'developer'      => $request->developer,
            'rented'         => $request->rented,
            'never_lived_in'                    => $request->never_lived_in,
            'featured_on_company_website'       => $request->featured_on_company_website,
            'exclusive_rights'                  => $request->exclusive_rights,
            'tenant_start_date'                 => $request->tenant_start_date,
            'tenant_end_date'                   => $request->tenant_end_date,
            'tenant'                            => $request->tenant,
            'views'                             => $request->views,
        ]);
    }
}