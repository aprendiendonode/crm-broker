<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

use Modules\Listing\Rules\CheckEmailInLead;
use Modules\Listing\Rules\CheckPhoneInLead;

use Modules\Listing\Rules\CheckEmailInOpportunity;
use Modules\Listing\Rules\CheckPhoneInOpportunity;

class UploadTemporaryPlanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'file' => ['required', 'file', 'mimes:jpeg,png,jpg,gif,svg'],
            'agency' => ['required', 'integer', 'exists:agencies,id'],
        ];
    }
    public function authorize()
    {
        return Gate::allows('manage_listing_setting');
    }
}