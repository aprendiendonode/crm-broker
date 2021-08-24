<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

use Modules\Listing\Rules\CheckEmailInLead;
use Modules\Listing\Rules\CheckPhoneInLead;

use Modules\Listing\Rules\CheckEmailInOpportunity;
use Modules\Listing\Rules\CheckPhoneInOpportunity;

class UpdateListingUploadsTitleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'title'  => ['required', 'string', 'max:225'],
            'id'     => ['required', 'integer'],
            'table'  => ['required', 'string', 'max:225', 'in:temporary_documents,temporary_plans,listing_documents,listing_plans'],
            'type'   => ['required', 'string', 'max:225', 'in:document,plan'],

        ];
    }
    public function authorize()
    {
        return Gate::allows('manage_listing_setting');
    }
}