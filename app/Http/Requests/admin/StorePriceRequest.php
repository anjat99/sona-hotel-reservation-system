<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePriceRequest extends FormRequest
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
            'price' => 'bail|required|numeric|gt:0|unique:prices,price'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'price.numeric' => 'Value of price must contains only digits'
        ];
    }
}
