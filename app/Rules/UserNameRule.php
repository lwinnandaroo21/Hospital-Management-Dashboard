<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UserNameRule implements Rule
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
        if(!ctype_upper(substr($value,0,1))){
            $this->message = "First character must be Capital Letter.";
            return false;
        }else if(!is_numeric(substr($value,-4,4))){
            $this->message = "Last 4 character must be digit.";
            return false;
        }else{
            return true;
        }
        
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
