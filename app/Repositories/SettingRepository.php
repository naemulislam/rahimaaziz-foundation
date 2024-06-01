<?php

namespace App\Repositories;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingRepository extends Repository
{
    public static function model()
    {
        return Setting::class;
    }

    public static function storeOrUpdateByRequest(SettingRequest $request, Setting $setting)
    {
        $file = $request->file('white_logo');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'setting'. '_' . uniqid() . '.' .$extension;
            if($setting?->white_logo){
                unlink(public_path($setting->white_logo));
            }
            $file->move(public_path('uploaded/setting'), $fileName);
            $whiteLogo = '/uploaded/setting/' . $fileName;
        }
        $file = $request->file('black_logo');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'setting'. '_' . uniqid() . '.' .$extension;
            if($setting?->black_logo){
                unlink(public_path($setting->black_logo));
            }
            $file->move(public_path('uploaded/setting'), $fileName);
            $blackLogo = '/uploaded/setting/' . $fileName;
        }
       $settingData = self::query()->updateOrCreate(
        [
            'id' => $setting->id ?? 0
        ],[
            'site_name' => $request->site_name,
            'site_slogan' => $request->site_slogan,
            'white_logo' => $whiteLogo ?? $setting->white_logo,
            'black_logo' => $blackLogo ?? $setting->black_logo,
            'address' => $request->address,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'instagram_link' => $request->instagram_link,
            'linkedin_link' => $request->linkedin_link,
            'youtube_link' => $request->youtube_link,
            'copyright' => $request->copyright,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return $settingData;
    }
}
