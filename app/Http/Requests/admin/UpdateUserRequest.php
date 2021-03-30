<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            "firstname" => "alpha|min:2|max:20|regex:/^[A-ZČĆŽŠĐ][a-zčćžšđ]{1,20}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{1,20})*$/",
            "lastname" => "alpha|min:2|max:30|regex:/^[A-ZČĆŽŠĐ][a-zčćžšđ]{1,30}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{1,30})*$/",
            "email" => "email",
            "userRole" => "exists:roles,id"
        ];
    }

    public function messages(){
        return [
            "firstname.regex" => "Firstname must contain at least 2 characters and max 20 characters .",
            "lastname.regex" => "Firstname must contain at least 2 characters and max 30 characters .",
            "email.email" => "Email is not in valid format",
            "userRole.exists" => "Selected role does not exist in the database."
        ];
    }
}
