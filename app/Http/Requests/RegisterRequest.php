<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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
            'username' => 'required|string|max:50',
            'vehicle_lp' => 'required|strinG|unique:users',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string|unique:users|digits:10',
            'password' => 'required|string|min:6|confirmed'
        ];
    }

    public function messages() {
        return [
            'email.unique' => 'This email is already registered.',
            'vehicle_lp.unique' => 'This license plate is already registered.',
            'password.confirmed' => 'Passwords do not match.',
            'phone_number.unique' => 'This phone number is already registered.',
            'phone_number.digits' => 'Invalid phone number length.',
            'password.min' => 'Password must be at least 6 characters.',
        ];
    }
}
