<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentRequest extends FormRequest
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
        $email = 'required|email|unique:users,email';
        $password = 'required|min:8|required_with:password_confirmation|same:password_confirmation';
        $password_confirmation = 'required|min:8';

        if (request()->isMethod('put')) {
            $password = 'nullable|min:8|required_with:password_confirmation|same:password_confirmation';
            $password_confirmation = 'nullable|min:8';
            $email = 'required|email';
        }
        return [
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string|in:male,female',
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password_confirmation,
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
