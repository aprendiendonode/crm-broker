<?php

namespace Modules\Listing\Rules;

use Illuminate\Support\Arr;
use Modules\Sales\Entities\Lead;
use Illuminate\Contracts\Validation\Rule;

class CheckPhoneInLead implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public $business;
    public $agency;
    public $message;
    public function __construct($business, $agency)
    {
        $this->business = $business;
        $this->agency   = $agency;
    }


    public function passes($attribute, $value)
    {

        $check_unique_phones = Lead::where('business_id', $this->business)->where('agency_id', $this->agency)->where(function ($query) use ($value) {
            $query->Where([
                ['phone1', '!=', null],
                ['phone1', $value],
            ])
                ->orWhere([
                    ['phone2', '!=', null],
                    ['phone2', $value],
                ])
                ->orWhere([
                    ['phone3', '!=', null],
                    ['phone3', $value],
                ])
                ->orWhere([
                    ['phone4', '!=', null],
                    ['phone4', $value],
                ])
                ->orWhere([
                    ['landline', '!=', null],
                    ['landline', $value],
                ]);
        })->get();
        if (count($check_unique_phones) > 0) {
            $this->message =  trans('sales.existing_phone_in_leads') . ' ' . $check_unique_phones->first()->full_name ?? '';
        }
        return  count($check_unique_phones) > 0 ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}