<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            "current_password" => "required|min:8|max:25|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,25}$/",
            "password" => "required|min:8|max:25|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,25}$/",
            'password_confirmation' => "required|min:8|max:25|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,25}$/",

        ];
    }
}
