<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $admins = AdminRepository::getAll();
        return view('backend.dashboard.profile.index_admin', compact('admins'));
    }

    public function create()
    {
        return view('backend.dashboard.profile.create_admin');
    }

    public function store(AdminRequest $request)
    {
        AdminRepository::storeByRequest($request);
        return redirect()->route('admin.index')->with('success', 'Admin is created successfully!');
    }

    public function edit(Admin $admin)
    {
        return view('backend.dashboard.profile.edit_admin', compact('admin'));
    }
    public function update(AdminRequest $request, Admin $admin)
    {
        AdminRepository::UpdateByRequest($request, $admin);
        $role = ucfirst($admin->role);
        return redirect()->route('admin.index')->with('success', $role . ' is updated successfully!');
    }
    //Admin Update profile methods
    public function getProfile()
    {
        return view('backend.dashboard.profile.profile');
    }

    public function updateProfile(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,jpeg',

        ]);
        AdminRepository::profileUpdateByRequest($request, $admin);

        return back()->with('success', 'Profile has been updated successfully!');
    }

    public function cPassword()
    {
        return view('backend.dashboard.profile.edit-password');
    }

    public function upassword(Request $request, Admin $admin)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);
        $checkPassword = Hash::check($request->current_password, $admin->password);

        if ($checkPassword) {
            $admin->update([
                'password' => Hash::make($request->new_password)
            ]);
            return back()->with('success', 'Password has been changed successfully!');
        } else {
            return back()->with('error', 'Sorry! Your current password dost not match.');
        }
    }
}
