<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            'name'=>'required|unique:rooms,name|min:2|max:200|regex:/^(.+\s?.*)*$/',
            'size' =>'required|numeric|gt:10',
            'description'=>'required|min:2|max:1000',
            'price'=>'required|exists:prices,id',
            'type'=>'required|exists:types,id',
            'image'=>'required|file|image|mimes:jpg,jpeg,JPG,JPEG,bmp,png',
            'service'=>'required|exists:services,id'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'The :attribute field is required.',
            'name.regex' => 'The name of room can containt at least 2 and maximum 255 characters including digits',
            'description.min' => 'The message needs to have at least :min characters!',
            'image.image' => 'Uploaded file must be an image.',
            "service.exists" => "Selected service does not exist in the database.",
            "type.exists" => "Selected type name does not exist in the database.",
            "price.exists" => "Selected price value does not exist in the database."
        ];
    }
}
