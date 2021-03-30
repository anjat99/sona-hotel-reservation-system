<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelServiceRequest extends FormRequest
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
            'title'=>'bail|required|min:2|max:50|unique:hotel_services,title|regex:/^(.+\s?.*)*$/',
            'image'=>'required|file|image|mimes:jpg,jpeg,JPG,JPEG,bmp,png',
            'description'=>'bail|required|min:2|max:500',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'The :attribute field is required.',
            'title.regex' => 'The name of room service can containt at least 2 and maximum 50 characters including digits',
            'image.image' => 'Uploaded file must be an image.',
        ];
    }
}
