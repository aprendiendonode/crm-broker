<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;


class UpdateListingFloorPlanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */



    protected function prepareForValidation()
    {
        $this->merge([
            'floors'              => json_decode($this->input('floors'), true),
        ]);
    }


    public function rules()
    {
        return [
            "floors"                             => ['required', 'array', 'present'],
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