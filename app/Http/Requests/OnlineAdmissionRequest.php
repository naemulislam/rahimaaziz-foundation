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
            'applicant_name' => 'required|string',
            'phone' => 'nullable',
            'student_type' => 'required|string|in:0,1',
            'admission_date' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'blood' => 'nullable',
            // 'gender' => 'required',
            'address' => 'required|string',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'father_name' => 'required',
            'father_call' => 'required',
            // 'father_email' => 'nullable|email',
            'mother_name' => 'required',
            'mother_call' => 'required',
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
