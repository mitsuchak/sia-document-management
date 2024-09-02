<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile_number' => 'required|numeric|max_digits:10|unique:users',
            'company_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'website' => 'string|max:255',
        ];
    }

    /**
     * Get the validation messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'The first name field is required.',
            'first_name.string' => 'The first name must be a string.',
            'first_name.max' => 'The first name may not be greater than :max characters.',
            
            'last_name.required' => 'The last name field is required.',
            'last_name.string' => 'The last name must be a string.',
            'last_name.max' => 'The last name may not be greater than :max characters.',
            
            'email.required' => 'The email address field is required.',
            'email.string' => 'The email address must be a string.',
            'email.email' => 'The email address must be a valid email.',
            'email.max' => 'The email address may not be greater than :max characters.',
            'email.unique' => 'The email address has already been taken.',
            
            'mobile_number.required' => 'The mobile number field is required.',
            'mobile_number.numeric' => 'The mobile number must be a number.',
            'mobile_number.max_digit' => 'The mobile number must not exceed :max digits.',
            'mobile_number.unique' => 'The mobile number has already been taken.',
            
            'company_name.required' => 'The company name field is required.',
            'company_name.string' => 'The company name must be a string.',
            'company_name.max' => 'The company name may not be greater than :max characters.',
            
            'designation.required' => 'The designation field is required.',
            'designation.string' => 'The designation must be a string.',
            'designation.max' => 'The designation may not be greater than :max characters.',

            'website.string' => 'The website must be a string.',
            'website.max' => 'The website may not be greater than :max characters.',
        ];
    }        
}
