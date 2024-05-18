<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        $email = 'required|unique:teachers,email';

        $password = 'required|min:8|required_with:password_confirmation|same:password_confirmation';
        $password_confirmation = 'required|min:8';
        if (request()->isMethod('put')) {
            $email = 'required';
            $password = 'nullable|min:8|required_with:password_confirmation|same:password_confirmation';
            $password_confirmation = 'nullable|min:8';
        }
        return [
            'name' => 'required|string',
            'email' => $email,
            'phone' => 'required',
            'group_id' => 'required',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'nullable|string',
            'marital_status' => 'nullable|string',
            'qualification' => 'nullable|string',
            'designation' => 'nullable|string',
            'data_of_joining' => 'nullable|string',
            'father_name' => 'nullable|string',
            'mother_name' => 'nullable|string',
            'c_address' => 'nullable|string',
            'teacher_image' => 'nullable|mimes:png,jpg,jpeg',
            'password' => $password,
            'password_confirmation' => $password_confirmation
        ];
    }
}
