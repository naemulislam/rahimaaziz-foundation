<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionRequest extends FormRequest
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
            'admission_no' => 'required|string',
            'roll' => 'required|integer',
            'registration_no' => 'required|string',
            'group_id' => 'required',
            'student_name' => 'required|string|max:40',
            'student_type' => 'required|string|in:0,1',
            'admission_date' => 'required',
            'admission_phone' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'blood' => 'nullable',
            'h_address' => 'required|string',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'father_name' => 'required',
            'father_call' => 'required',
            'mother_name' => 'required',
            'mother_call' => 'required',
            'admi_photo' => 'required'
        ];
    }
}
