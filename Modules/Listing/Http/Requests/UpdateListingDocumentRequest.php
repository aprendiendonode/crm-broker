<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Listing\Rules\ComareArrayCount;

class UpdateListingDocumentRequest extends FormRequest
{


    protected function prepareForValidation()
    {
        $this->merge([
            'documents' => json_decode($this->input('documents'), true),

        ]);
    }

    public function rules()
    {

        return [
            "documents"                             => ['required', 'array'],
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