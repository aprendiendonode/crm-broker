<?php

namespace Modules\Listing\Rules;

use Illuminate\Support\Arr;
use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Opportunity;
use Illuminate\Contracts\Validation\Rule;

class CheckEmailInOpportunity implements Rule
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

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $check_unique_emails = Opportunity::where('business_id', $this->business)->where('agency_id', $this->agency)->where(function ($query) use ($value) {

            $query->where([
                ['email1', '!=', null],
                ['email1', $value],
            ])
                ->orWhere([
                    ['email2', '!=', null],
                    ['email2', $value],
                ])->orWhere([
                    ['email3', '!=', null],
                    ['email3', $value],
                ])->orWhere([
                    ['skype', '!=', null],
                    ['skype', $value],
                ]);
        })->get();
        if (count($check_unique_emails) > 0) {
            $this->message =  trans('sales.existing_email_in_opportunities') . ' ' . $check_unique_emails->first()->full_name ?? '';
        }
        return count($check_unique_emails) > 0 ? false : true;
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