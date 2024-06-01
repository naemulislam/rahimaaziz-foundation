<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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

    public function rules()
    {
        return [
            'site_name' => 'required|string',
            'site_slogan' => 'nullable|string',
            'white_logo' => 'nullable|mimes:png,jpg,jpeg',
            'black_logo' => 'nullable|mimes:png,jpg,jpeg',
            'address' => 'required|string',
            'facebook_link' => 'nullable|string',
            'twitter_link' => 'nullable|string',
            'instagram_link' => 'nullable|string',
            'linkedin_link' => 'nullable|string',
            'youtube_link' => 'nullable|string',
            'copyright' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
        ];
    }
}
