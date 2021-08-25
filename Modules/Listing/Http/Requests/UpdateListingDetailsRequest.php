<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdateListingDetailsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */



    protected function prepareForValidation()
    {
        $this->merge([
            'views' => json_decode($this->input('views'), true)
        ]);
    }


    public function rules()
    {


        return [
            "purpose"                                  => ['required', 'in:sale,rent,short'],
            "views"                                    => ['required', 'array', 'present'],
            'views.*'                                  => [Rule::exists('listing_views', 'id')],
            "title"                                    => ['sometimes', 'nullable', 'string'],
            "type" => [
                'required', 'integer', Rule::exists('listing_types', 'id')
            ],
            "status"                                   => ['required', 'in:draft,live,archive,review'],
            "never_lived_in"                           => ['sometimes', 'nullable', 'in:yes,no'],
            "featured_on_company_website"              => ['sometimes', 'nullable', 'in:yes,no'],
            "exclusive_rights"                         => ['sometimes', 'nullable', 'in:yes,no'],
            "beds"                                     => ['sometimes', 'nullable', 'string'],
            "baths"                                    => ['sometimes', 'nullable', 'integer'],
            "parkings"                                 => ['sometimes', 'nullable', 'integer'],
            "year_built"                               => ['sometimes', 'nullable', 'integer'],
            "developer"                                => ['sometimes', 'nullable', Rule::exists('developers', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency'));
            })],
            "plot_area"                                => ['sometimes', 'nullable', 'numeric'],
            "area"                                     => ['required', 'numeric'],
            "lsm"                                      => ['required', 'in:private,shared'],
            "landlord"                                 => ['sometimes', 'nullable', Rule::exists('clients', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency'));
            })],
            "rented"                                   => ['required', 'in:yes,no'],
            "tenant_start_date"                        => ['sometimes', 'nullable',  "before_or_equal:tenant_end_date_" . request('listing'), 'date_format:Y-m-d'],
            "tenant_end_date"                          => ['sometimes', 'nullable',  "after_or_equal:tenant_start_date_" . request('listing'), 'date_format:Y-m-d'],
            "tenant"                                   => ['sometimes', 'nullable', Rule::exists('clients', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency'));
            })],
            "source"                                   => ['required', Rule::exists('lead_sources', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency'));
            })],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('edit_listing');
    }
}