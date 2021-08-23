<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;


class UpdateListingExtraInfoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "key_location"                             => ['sometimes', 'nullable', 'string'],
            "govfield1"                                => ['sometimes', 'nullable', 'string'],
            "govfield2"                                => ['sometimes', 'nullable', 'string'],
            "yearly_service_charges"                   => ['sometimes', 'nullable', 'numeric'],
            "monthly_cooling_charges"                  => ['sometimes', 'nullable', 'numeric'],
            "monthly_cooling_provider"                 => ['sometimes', 'nullable', 'numeric'],
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