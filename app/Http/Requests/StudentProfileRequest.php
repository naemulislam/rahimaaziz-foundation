<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentProfileRequest extends FormRequest
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
            'name' => 'required|string',
            'phone' =>'required',
            'place_of_birth' => 'required',
            'blood' => 'nullable',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'father_name' => 'required',
            'father_call' => 'required',
            'father_email' => 'nullable|email',
            'father_langu_spoken' => 'nullable|string',
            'mother_name' => 'required',
            'mother_call' => 'required',
            'mother_email' => 'nullable|email',
            'mother_langu_spoken' => 'nullable|string',
            'e_name' => 'nullable|string',
            'e_call' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ];
    }
}
