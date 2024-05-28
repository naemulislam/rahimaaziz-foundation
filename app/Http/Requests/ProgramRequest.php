<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
        $document = 'required|mimes:jpg,png,jpeg|max:2048';
        if (request()->isMethod('put')) {
            $document = 'nullable|mimes:jpg,png,jpeg|max:2048';
        }
        return [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'document' => $document,
        ];
    }
}
