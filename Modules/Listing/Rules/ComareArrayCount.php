<?php

namespace Modules\Listing\Rules;

use Illuminate\Support\Arr;
use Illuminate\Contracts\Validation\Rule;

class ComareArrayCount implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public $firstArray;
    public $secArray;
    public function __construct($firstArray, $secArray)
    {
        $this->firstArray = $firstArray;
        $this->secArray = $secArray;
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

        return  count($value) == count($this->firstArray) || count($value) == count($this->secArray);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The :attribute Count Isn't Valid";
    }
}