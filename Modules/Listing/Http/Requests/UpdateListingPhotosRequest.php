<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UpdateListingPhotosRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */



    protected function prepareForValidation()
    {
        $this->merge([
            'photos'              => json_decode($this->input('photos'), true),
            'checked_main_hidden' => json_decode($this->input('checked_main_hidden'), true)
        ]);
    }


    public function rules()
    {
        return [
            "photos"                             => ['required', 'array', 'present'],
            "checked_main_hidden"                => ['sometimes', 'nullable', 'array'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}