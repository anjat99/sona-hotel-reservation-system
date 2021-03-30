<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'message'=>'bail|required|min:1|'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'message.min' => 'The message needs to have at least :min characters!'
        ];
    }
}
