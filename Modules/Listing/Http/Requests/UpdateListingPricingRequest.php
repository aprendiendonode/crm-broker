<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Support\Facades\Gate;


// use Illuminate\Foundation\Http\FormRequest;

class UpdateListingPricingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "price"                                   => ['required', 'string'],
            "rent_frequency"                          => ['sometimes', 'nullable', 'string', 'in:yearly,monthly,weekly,daily'],
            "commission_percent"                      => ['sometimes', 'nullable', 'numeric'],
            "commission_value"                        => ['sometimes', 'nullable', 'string'],
            "deposite_percent"                        => ['sometimes', 'nullable', 'numeric'],
            "deposite_value"                          => ['sometimes', 'nullable', 'string'],
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