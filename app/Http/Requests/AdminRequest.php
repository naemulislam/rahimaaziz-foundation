<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $password ='required|min:8|required_with:password_confirmation|same:password_confirmation';
        $confirmPassword = 'required|min:8';
        if(request()->isMethod('put')){
            $password ='nullable|min:8|required_with:password_confirmation|same:password_confirmation';
            $confirmPassword = 'nullable|min:8';
        }
        return [
            'name' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required',
            'address' => 'nullable|string',
            'password' =>  $password,
            'password_confirmation' => $confirmPassword,
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ];
    }
}
