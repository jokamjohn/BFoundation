<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerRegisterRequest extends FormRequest
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
            'firstName' => 'required|max:20',
            'lastName' => 'required|max:20',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|confirmed|min:6',
        ];
    }

    /**Error messages if validation fails.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'firstName.required' => 'Enter your first name',
            'firstName.max' => 'The max characters are 20',
            'lastName.required' => 'Enter your last name',
            'lastName.max' => 'The max characters are 20',
            'email.required' => 'Enter your email address',
            'email.unique' => 'Email is already taken',
            'password.required' => 'Enter a password',
            'password.min' => 'Password must be 6 characters and above'
        ];
    }
}
