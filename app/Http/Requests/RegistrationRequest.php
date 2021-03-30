<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "firstname" => "bail|required|alpha|min:2|max:20|regex:/^[A-ZČĆŽŠĐ][a-zčćžšđ]{1,20}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{1,20})*$/",
            "lastname" => "bail|required|alpha|min:2|max:30|regex:/^[A-ZČĆŽŠĐ][a-zčćžšđ]{1,30}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{1,30})*$/",
            "email" => "bail|required|email|unique:users",
            "password" => [
                'required',
                'min:8', 'max:25',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,25}$/'
            ]

        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required.',
            "firstname.regex" => "Firstname must contain at least 2 characters and max 20 characters .",
            "lastname.regex" => "Firstname must contain at least 2 characters and max 30 characters .",
            "email.email" => "Email is not in valid format",
            "password.regex" => "The :attribute needs to have at least 1 lowercase, 1 uppercase character and 1 digit with minimum 8 and maximum 25 characters."
        ];
    }
}
