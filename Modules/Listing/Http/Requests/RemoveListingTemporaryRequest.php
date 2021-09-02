<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

use Modules\Listing\Rules\CheckEmailInLead;
use Modules\Listing\Rules\CheckPhoneInLead;

use Modules\Listing\Rules\CheckEmailInOpportunity;
use Modules\Listing\Rules\CheckPhoneInOpportunity;

class RemoveListingTemporaryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [

            'table' => ['required', 'in:temporary,main'],
            'type' => ['required', 'in:photo,plan,document'],
        ];
    }
    public function authorize()
    {
        return Gate::allows('manage_listing_setting');
    }
}