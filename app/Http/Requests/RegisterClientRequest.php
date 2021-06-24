<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class RegisterClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Session::exists('login')) {
            return false;
        }
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
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'cellphone' => 'required|integer',
            'address' => 'required',
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
            'name.required' => 'El campo es obligatorio.',
            'lastname.required' => 'El campo es obligatorio.',
            'email.required' => 'El campo es obligatorio.',
            'email.email' => 'Ingrese un email válido.',
            'password.required' => 'El campo es obligatorio.',
            'cellphone.required' => 'El campo es obligatorio.',
            'address.required' => 'El campo es obligatorio.',
        ];
    }
}
