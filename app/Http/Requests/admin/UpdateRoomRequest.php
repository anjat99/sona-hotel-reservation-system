<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
            'name'=>'min:2|max:255|regex:/^(.+\s?.*)*$/',
            'size' =>'numeric|gt:10',
            'description'=>'min:2|max:1000',
            'price'=>'exists:prices,id',
            'type'=>'exists:types,id',
            'image'=>'file|image|mimes:jpg,jpeg,JPG,JPEG,bmp,png',
            'service'=>'exists:services,id'
        ];
    }

    public function messages()
    {
        return [

            'name.regex' => 'The name of room can containt at least 2 and maximum 255 characters including digits',
            'description.min' => 'The message needs to have at least :min characters!',
            'image.image' => 'Uploaded file must be an image.',
            'image.max' => 'Uploaded file must not be larger than :max kilobytes.',
            "service.exists" => "Selected service does not exist in the database.",
            "type.exists" => "Selected type name does not exist in the database.",
            "price.exists" => "Selected price value does not exist in the database."
        ];
    }
}
