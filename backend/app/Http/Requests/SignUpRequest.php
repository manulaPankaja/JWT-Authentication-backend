<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ];
    }
}

// code to make this request - php artisan make:request SignUpRequest

// This is a PHP code snippet that defines a form request for signing up a new user. It is written using the Laravel framework, which is a popular PHP web application framework.

// The code defines a class named SignUpRequest that extends the FormRequest class provided by Laravel. The FormRequest class provides functionality for validating form input data.

// The authorize() method returns true, which means that all users are authorized to make this request. In more complex applications, you might use this method to check if a user is authenticated or authorized to perform the requested action.

// The rules() method defines the validation rules for the input data. In this case, the name field is required, the email field must be a valid email address and must be unique in the users table, and the password field is required and must match a confirmation field.

// These rules ensure that the input data is valid before it is used to create a new user account. If the validation fails, Laravel will automatically redirect the user back to the form with the validation errors displayed.
