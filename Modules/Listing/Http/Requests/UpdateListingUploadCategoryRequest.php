<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

use Modules\Listing\Rules\CheckEmailInLead;
use Modules\Listing\Rules\CheckPhoneInLead;

use Modules\Listing\Rules\CheckEmailInOpportunity;
use Modules\Listing\Rules\CheckPhoneInOpportunity;

class UpdateListingUploadCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $table =   $this->table == 'temp' ? 'temporary_listings_photos' : 'listing_photos';
        return [
            'table'         => ['required', 'in:temp,main'],
            'category_id'   => ['required', 'exists:listing_categories,id'],
            'id'            => ['required', 'exists:' . $table . ',id'],
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