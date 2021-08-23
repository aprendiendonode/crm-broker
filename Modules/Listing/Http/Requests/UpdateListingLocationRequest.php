<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Support\Facades\Gate;

// use Illuminate\Foundation\Http\FormRequest;

class UpdateListingLocationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "loc_lat"                                  => ['sometimes', 'nullable', 'string'],
            "loc_lng"                                  => ['sometimes', 'nullable', 'string'],
            "location"                                 => ['sometimes', 'nullable', 'string'],
            "city"                                     => ['required'],
            "community"                                => ['required'],
            "sub_community"                            => ['sometimes', 'nullable', 'string', 'exists:sub_communities,id'],
            "sub_community"                            => ['sometimes', 'nullable', 'string', 'exists:sub_communities,id'],
            "unit"                                     => ['sometimes', 'nullable', 'string'],
            "plot"                                     => ['sometimes', 'nullable', 'string'],
            "street"                                   => ['sometimes', 'nullable', 'string'],
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