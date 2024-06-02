<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherProfileRequest;
use App\Models\Teacher;
use App\Repositories\TeacherProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getProfile()
    {
        return view('backend.teacher.dashboard.profile.profile');
    }

    public function update(TeacherProfileRequest $request, Teacher $teacher)
    {
        TeacherProfileRepository::storeByRequest($request, $teacher);
        return back()->with('success', 'Profile is updated successfully!');
    }

    public function cPassword()
    {
        return view('backend.teacher.dashboard.profile.edit_password');
    }

    public function upassword(Request $request, Teacher $teacher)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);
        $currentPassword = $request->current_password;
        $isPassword = Hash::check($currentPassword, $teacher->password);
        if ($isPassword) {
            $teacher->update([
                'password' => Hash::make($request->new_password)
            ]);

            return back()->with('success', 'Password is updated successfully!');
        } else {

            return back()->with('error', 'Sorry! Your current password dost not match.');
        }
    }
}
