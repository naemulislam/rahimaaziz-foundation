<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Repositories\SettingRepository;

class SettingController extends Controller
{

    public function index()
    {
        $data = SettingRepository::query()->latest()->first();
        return view('backend.dashboard.setting.setting', compact('data'));
    }

    public function update(SettingRequest $request, Setting $setting)
    {
        SettingRepository::storeOrUpdateByRequest($request, $setting);
        return back()->with('success', 'Setting is updated successfully!');
    }
}
