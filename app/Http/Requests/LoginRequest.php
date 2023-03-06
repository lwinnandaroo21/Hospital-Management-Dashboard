<?php

namespace App\Http\Requests;

use App\Rules\PasswordRule;
use App\Rules\SpecialChRule;
use App\Rules\UserNameRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "username" =>["required",new UserNameRule(),new SpecialChRule()],
            "password" =>["required","min:8","max:12",new PasswordRule()]
        ];
    }
}
