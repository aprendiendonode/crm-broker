<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

use Modules\Listing\Rules\CheckEmailInLead;
use Modules\Listing\Rules\CheckPhoneInLead;

use Modules\Listing\Rules\CheckEmailInOpportunity;
use Modules\Listing\Rules\CheckPhoneInOpportunity;

class CreateListingTenantRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [

            'name' => ['required', 'string', 'max:225'],
            'email' => [
                'sometimes', 'nullable', 'email', 'string', 'max:225',
                Rule::unique('clients', 'email1'), Rule::unique('clients', 'email2'),
                new CheckEmailInLead(request('business'), request('agency')),
                new CheckEmailInOpportunity(request('business'), request('agency'))


            ],
            'phone' => [
                'sometimes', 'nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/',
                Rule::unique('clients', 'phone1'), Rule::unique('clients', 'phone2'),
                new CheckPhoneInLead(request('business'), request('agency')),
                new CheckPhoneInOpportunity(request('business'), request('agency'))
            ],
            'salutation' => ['required', 'string', 'in:Mr,Mrs,Ms,Miss'],
            'source_id' => ['sometimes', 'nullable', 'string', 'exists:lead_sources,id'],
            'agency' => ['required', 'integer', 'exists:agencies,id'],
            'business' => ['required', 'integer', 'exists:businesses,id'],



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