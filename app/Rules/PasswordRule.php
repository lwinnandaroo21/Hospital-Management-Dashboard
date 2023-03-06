<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordRule implements Rule
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
        $numberCheck="";
        for($i=0;$i<strlen($value);$i++){
            if(ctype_digit($value[$i])){
                $numberCheck .=$value[$i];
            }
        }
        if(strlen($numberCheck<2)){
            $this->message = "Password must be include at least 2 digits.";
            return false;
        }
        else if(!ctype_lower(preg_replace("/[^a-zA-Z]+/", "", $value))){
            $this->message = "All characters must be lower letter.";
            return false;
        }
        else{
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
