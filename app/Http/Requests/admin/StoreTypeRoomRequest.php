<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRoomRequest extends FormRequest
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
            'type' => 'bail|required|min:2|max:30|unique:types,name|regex:/^[A-ZČĆŽŠĐ]?[a-zčćžšđ]{2,10}(\s[A-ZČĆŽŠĐ]?[a-zčćžšđ]{1,10})*$/',
            'capacity' => 'bail|required|numeric|gt:0|lte:10',
            'quantity' => 'bail|required|numeric|gt:0|lte:20'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'The :attribute field is required.',
            'type.regex' => 'The type of room name can contains only characters at least 2 and maximum 30 characters.Space character can be included in it',
            'numeric' => 'The :attribute field must contains only digits',

        ];
    }
}
