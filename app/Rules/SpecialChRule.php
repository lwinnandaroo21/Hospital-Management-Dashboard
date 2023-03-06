<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SpecialChRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        
        if(preg_match('/[^a-z0-9 ]+/i', $value)){
                return true;
            }else{
                return false;
            }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'UserName must be include Special Character.';
    }
}
