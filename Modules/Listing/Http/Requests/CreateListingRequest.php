<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Validation\Rule;
use App\Rules\ArrayIndexNotNull;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Listing\Rules\ComareArrayCount;
use Modules\Listing\Rules\VideoArrayFirstIndexNotNull;

class CreateListingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
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
            "view_ids.*"                                => ['sometimes', 'nullable', Rule::exists('listing_views', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency_id'));
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
            "developer_id"                             => ['sometimes', 'nullable', Rule::exists('developers', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency_id'));
            })],
            "plot_area"                                => ['sometimes', 'nullable', 'numeric'],
            "area"                                     => ['required', 'numeric'],

            "deposite_percent"                         => ['sometimes', 'nullable', 'numeric'],
            "deposite_value"                           => ['sometimes', 'nullable', 'string'],
            "listing_rent_cheque_id"                   => ['sometimes', 'nullable', Rule::exists('listing_rent_cheques', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency_id'));
            })],
            "title"                                    => ['sometimes', 'nullable', 'string'],
            "lsm"                                      => ['required', 'in:private,shared'],
            // "permit_no"                                => ['sometimes', 'nullable', 'string'],
            // "rera_property_no_status"                  => ['required', 'in:invalid,valid'],
            // "rera_property_no_log"                     => ['required', 'numeric'],
            // "rera_property_no"                         => ['sometimes', 'nullable', 'string'],
            // "rera_property_expiry_date"                => ['sometimes', 'nullable', 'string', 'date_format:Y-m-d'],
            "landlord_id"                              => ['sometimes', 'nullable', Rule::exists('clients', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency_id'));
            })],
            "rented"                                   => ['required', 'in:yes,no'],
            "tenancy_contract_start_date"              => ['sometimes', 'nullable', 'string', 'before_or_equal:tenancy_contract_end_date', 'date_format:Y-m-d'],
            "tenancy_contract_end_date"                => ['sometimes', 'nullable', 'string', 'after_or_equal:tenancy_contract_start_date', 'date_format:Y-m-d'],
            "tenant_id"                                => ['sometimes', 'nullable', Rule::exists('clients', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency_id'));
            })],
            "source_id"                                => ['required', Rule::exists('lead_sources', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency_id'));
            })],
            "assigned_to"                              => ['required', Rule::exists('users', 'id')->where(function ($q) {
                $q->where('business_id', request('business_id'));
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

            "video_title"                              => [
                'required', 'array', new ComareArrayCount(request('video_link'), request('video_host'))
            ],
            "video_link"                               => ['required', 'array'],
            "video_host"                               => ['required', 'array'],
            "description_en"                           => ['sometimes', 'nullable', 'string'],

            "description_ar"                           => ['sometimes', 'nullable', 'string'],

            "cheque_date"                              => ['required', 'array', new ComareArrayCount(request('cheque_amount'), request('cheque_percentage'))],
            "cheque_amount"                            => ['required', 'array'],
            "cheque_percentage"                        => ['required', 'array'],


            "photos"                                   => ['sometimes', 'nullable', 'array'],

            // |regex:/^([0-9\s\-\+\(\)]*)$/



        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('add_listing');
    }
}