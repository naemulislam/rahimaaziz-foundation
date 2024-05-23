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

        return [
            'group_id' => 'required',
            'applicant_name' => 'required|string|max:30',
            'phone' => 'nullable',
            'student_type' => 'required|string|in:0,1',
            'admission_date' => 'required|date',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:100',
            'blood' => 'nullable|string',
            'gender' => 'required|in:male,female',
            'email' => 'required|email',
            // 'gender' => 'required',
            'address' => 'required|string|max:200',
            'city' => 'required|string|max:50',
            'state' => 'required|string|max:50',
            'zip_code' => 'required',
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
            'student_image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
