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
        $applicantName = 'required|string';
        $phone = 'required';
        $email = 'required|email';
        $gender = 'required|in:male,female';
        if(request()->student_id){
            $applicantName = 'nullable|string';
            $phone = 'nullable';
            $email = 'nullable|email';
            $gender = 'nullable|in:male,female';
        }
        $b_certificate = 'required|mimes:jpg,jpeg,pdf|max:5120';
        $immu_record = 'required|mimes:jpg,jpeg,pdf|max:5120';
        $proof_address = 'required|mimes:jpg,jpeg,pdf|max:5120';
        if (request()->isMethod('put')) {
            $b_certificate = 'nullable|mimes:jpg,jpeg,pdf|max:5120';
            $immu_record = 'nullable|mimes:jpg,jpeg,pdf|max:5120';
            $proof_address = 'nullable|mimes:jpg,jpeg,pdf|max:5120';
        }
        return [
            'admission_no' => 'required|string',
            'roll' => 'required|integer',
            'registration_no' => 'required|string',
            'group_id' => 'required',
            'applicant_name' => $applicantName,
            'phone' => $phone,
            'student_type' => 'required|string|in:0,1',
            'admission_date' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'blood' => 'nullable',
            'email' => $email,
            'gender' => $gender,
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
            'b_certificate' => $b_certificate,
            'immu_record' => $immu_record,
            'proof_address' => $proof_address,
            'physical_health' => 'nullable|mimes:jpg,jpeg,pdf|max:5120',
            'mrrcfps' => 'nullable|mimes:jpg,jpeg,pdf|max:5120',
            'hsral' => 'nullable|mimes:jpg,jpeg,pdf|max:5120',
            'student_image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
