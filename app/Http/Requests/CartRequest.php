<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'creditcard_name' => 'required',
            'creditcard_number' => 'required',
            'creditcard_code' => 'required',
            'creditcard_date' => 'required'
        ];
    }
    /**
     * Get the validation messagges that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'creditcard_name.required' => 'El campo es obligatorio.',
            'creditcard_number.required' => 'El campo es obligatorio.',
            'creditcard_code.required' => 'El campo es obligatorio.',
            'creditcard_date.required' => 'El campo es obligatorio.'
        ];
    }
}
