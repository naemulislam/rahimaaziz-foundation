<?php

namespace App\Repositories;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRepository extends Repository
{
    public static function model()
    {
        return Admin::class;
    }

    public static function profileUpdateByRequest(Request $request, Admin $admin)
    {
        $file = $request->file('profile_image');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'admin' . '_' . uniqid() . '.' . $extension;
            if ($admin->image) {
                unlink(public_path($admin->image));
            }
            $file->move(public_path('uploaded/admin'), $fileName);
            $imagePath = '/uploaded/admin/' . $fileName;
        }
        $adminProfile = self::update($admin, [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'image' => $imagePath ?? $admin->image,
        ]);
        return $adminProfile;
    }
    public static function storeByRequest(AdminRequest $request){
        $file = $request->file('image');
        $imagePath = null;
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'admin' . '_' . uniqid() . '.' . $extension;
            $file->move(public_path('uploaded/admin'), $fileName);
            $imagePath = '/uploaded/admin/' . $fileName;
        }
        $adminCreate = self::create( [
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'phone' => $request->mobile,
            'gender' => $request->gender,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'image' => $imagePath,
        ]);
        return $adminCreate;

    }
    public static function UpdateByRequest(AdminRequest $request, Admin $admin)
    {
        $file = $request->file('image');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'admin' . '_' . uniqid() . '.' . $extension;
            if ($admin->image) {
                unlink(public_path($admin->image));
            }
            $file->move(public_path('uploaded/admin'), $fileName);
            $imagePath = '/uploaded/admin/' . $fileName;
        }
        $adminUpdate = self::update($admin, [
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'phone' => $request->mobile,
            'gender' => $request->gender,
            'address' => $request->address,
            'image' => $imagePath ?? $admin->image,
        ]);
        return $adminUpdate;
    }
}
