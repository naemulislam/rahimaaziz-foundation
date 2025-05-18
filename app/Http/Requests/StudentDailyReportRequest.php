<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentDailyReportRequest extends FormRequest
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
           'report_name' => 'required|string|max:255',
            'juz_number' => 'required|integer|between:1,30',
            'page_number' => 'required',
            'ayat' => 'required|integer|between:1,6236',
            'report_date' => 'required|date',
            'report_type' => 'required|in:1,2,3'
        ];
    }
}
