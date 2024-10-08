<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnlineAdmissionRequest extends FormRequest
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
        $prevSchoolAddress = 'required|string|max:200';
        $prevSchoolCity = 'required|string|max:50';
        $prevSchoolState = 'required|string|max:50';
        $prevSchoolZipCode = 'required|string';
        $prevSchoolPhone = 'required|string';
        if(request()->student_type == 1){
            $prevSchoolAddress = 'nullable|string|max:200';
            $prevSchoolCity = 'nullable|string|max:50';
            $prevSchoolState = 'nullable|string|max:50';
            $prevSchoolZipCode = 'nullable|string';
            $prevSchoolPhone = 'nullable|string';
        }

        return [
            'group_id' => 'required',
            'f_name' => 'required|string|max:30',
            'm_name' => 'required|string|max:30',
            'l_name' => 'required|string|max:30',
            'phone' => 'nullable',
            'class_grade' => 'required|string',
            'student_type' => 'required|string|in:0,1',
            'admission_date' => 'required|date',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:100',
            'blood' => 'nullable|string',
            'gender' => 'required|in:male,female',
            'email' => 'required|email',
            //'gender' => 'required',
            'address' => 'required|string|max:200',
            'city' => 'required|string|max:50',
            'state' => 'required|string|max:50',
            'zip_code' => 'required',
            //Previous School Details
            'prev_school_address' => $prevSchoolAddress,
            'prev_school_city' => $prevSchoolCity,
            'prev_school_state' => $prevSchoolState,
            'prev_school_zip_code' => $prevSchoolZipCode,
            'prev_school_phone' => $prevSchoolPhone,
            'father_name' => 'required|string|max:30',
            'father_call' => 'required',
            'father_langu_spoken' => 'required|string|max:100',
            'father_email' => 'nullable|email',
            'mother_name' => 'required|string|max:30',
            'mother_call' => 'required',
            'mother_langu_spoken' => 'required|max:100',
            'mother_email' => 'nullable|email',
            // 'e_name' => 'nullable|string',
            // 'e_call' => 'nullable',
            'b_certificate' => 'required|mimes:jpg,jpeg,pdf|max:5120',
            'immu_record' => 'required|mimes:jpg,jpeg,pdf|max:5120',
            'proof_address' => 'required|mimes:jpg,jpeg,pdf|max:5120',
            'physical_health' => 'nullable|mimes:jpg,jpeg,pdf|max:5120',
            'mrrcfps' => 'nullable|mimes:jpg,jpeg,pdf|max:5120',
            'hsral' => 'nullable|mimes:jpg,jpeg,pdf|max:5120',
            'student_image' => 'required|mimes:png,jpg,jpeg|max:2048',
            // 'terms_conditions*' => 'required|array',
            // 'terms_conditions.*' => 'required'
        ];
    }
}
