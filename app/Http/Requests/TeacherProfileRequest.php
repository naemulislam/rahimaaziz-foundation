<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherProfileRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'date_of_birth' => 'nullable|string',
            'marital_status' => 'nullable|string',
            'father_name' => 'nullable|string',
            'mother_name' => 'nullable|string',
            'qualification' => 'nullable|string',
            'designation' => 'nullable|string',
            'c_address' => 'nullable|string',
            'data_of_joining' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
