<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomServiceRequest extends FormRequest
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
           'name'=>'bail|required|min:2|max:100|unique:services,name|regex: /^(.+\s?.*)*$/'

        ];
    }

    public function messages()
    {
        return [
            'required'=>'The :attribute field is required.',
            'name.regex' => 'The name of room service can containt at least 2 and maximum 50 characters including digits'
        ];
    }
}
