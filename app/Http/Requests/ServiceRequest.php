<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        $image = 'required|mimes:jpg,png,jpeg|max:2048';
        $icon = 'required|mimes:jpg,png|max:2048';
        if (request()->isMethod('put')) {
            $image = 'nullable|mimes:jpg,png,jpeg|max:2048';
            $icon = 'nullable|mimes:jpg,png|max:2048';
        }
        return [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'image' => $image,
            'icon' => $icon,
        ];
    }
}
