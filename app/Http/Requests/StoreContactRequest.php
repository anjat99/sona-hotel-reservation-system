<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name'=>"bail|required|alpha|min:2|max:20|regex:/^[A-ZČĆŽŠĐ][a-zčćžšđ]{1,40}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{1,40})*$/",
            "email"=>"bail|required|email",
            "subject"=>"bail|required|min:1",
            "message"=>'bail|required|min:1'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            "name.regex" => "Name must contain at least 2 characters and max 40 characters .Also if you have more names you can type it in",
            "email.email" => "Email is not in valid format",
            'message.min' => 'The message needs to have at least :min characters!'
        ];
    }
}
