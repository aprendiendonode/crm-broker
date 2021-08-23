<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Support\Facades\Gate;

// use Illuminate\Foundation\Http\FormRequest;

class UpdateListingFeatureRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([

            'checkboxesFeatureName'      => json_decode($this->input('checkboxesFeatureName'), true),
            'checkboxesFeatureValue'     => json_decode($this->input('checkboxesFeatureValue'), true),
            'inputsFeatureName'          => json_decode($this->input('inputsFeatureName'), true),
            'inputsFeatureValue'         => json_decode($this->input('inputsFeatureValue'), true),
            'selectsFeatureName'         => json_decode($this->input('selectsFeatureName'), true),
            'selectsFeatureValue'        => json_decode($this->input('selectsFeatureValue'), true),
        ]);
    }

    public function rules()
    {

        return [
            "checkboxesFeatureName"                              => ['sometimes', 'nullable', 'array'],
            "checkboxesFeatureValue"                             => ['sometimes', 'nullable', 'array'],
            "inputsFeatureName"                                  => ['sometimes', 'nullable', 'array'],
            "inputsFeatureValue"                                 => ['sometimes', 'nullable', 'array'],
            "selectsFeatureName"                                 => ['sometimes', 'nullable', 'array'],
            "selectsFeatureValue"                                => ['sometimes', 'nullable', 'array'],
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