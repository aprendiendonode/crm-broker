<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;


class UpdateListingDescriptionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "edit_description_en_" . request('listing_id')                => ['sometimes', 'nullable', 'string'],
            "edit_description_ar_" . request('listing_id')                => ['sometimes', 'nullable', 'string'],

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