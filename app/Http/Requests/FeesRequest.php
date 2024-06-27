<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeesRequest extends FormRequest
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
        $discount = 'nullable';
        if(request()->discount_type){
            $discount = 'required';
        }
        return [
            'group_id' => 'required',
            'student_id' => 'required',
            'pay_date' => 'required|date',
            'fees_amount' => 'required',
            'discount_type' => 'nullable',
            'discount' => $discount,
            'pay_type' => 'required|string'
        ];
    }
}
