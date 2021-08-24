<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

use Modules\Listing\Rules\CheckEmailInLead;
use Modules\Listing\Rules\CheckPhoneInLead;

use Modules\Listing\Rules\CheckEmailInOpportunity;
use Modules\Listing\Rules\CheckPhoneInOpportunity;

class CreateListingDeveloperRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [

            'name_en' => ['required', 'string', 'max:225'],
            'name_ar' => ['sometimes', 'nullable', 'string', 'max:225'],

            'agency' => ['required', 'integer', 'exists:agencies,id'],
            'business' => ['required', 'integer', 'exists:businesses,id']

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('manage_listing_setting');
    }
}