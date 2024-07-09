<?php

namespace App\Repositories;

use App\Http\Requests\ParentRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentRepository extends Repository
{
    public static function model()
    {
        return User::class;
    }

    public static function storeByRequest(ParentRequest $request)
    {
        $image = $request->file('image');
        $imagePath = null;
        if ($image) {
            $imageName = 'parent'. '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/parent'), $imageName);
            $imagePath = '/uploaded/parent/' . $imageName;
        }
        $parentCreate = self::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => Carbon::now(),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'image' =>  $imagePath
        ]);
        return $parentCreate;
    }
    public static function updateByRequest(ParentRequest $request, User $user)
    {
        $password = $user->password;
        if($request->password){
            $password = Hash::make($request->password);
        }
        $image = $request->file('image');
        $imagePath = null;
        if ($image) {
            $imageName = 'parent'. '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            if($user->image){
                unlink(public_path($user->image));
            }
            $image->move(public_path('uploaded/parent'), $imageName);
            $imagePath = '/uploaded/parent/' . $imageName;
        }
        $parentUpdate = self::update($user,[
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => Carbon::now(),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'password' => $password,
            'image' =>  $imagePath ?? $user->image
        ]);
        return $parentUpdate;
    }
}
