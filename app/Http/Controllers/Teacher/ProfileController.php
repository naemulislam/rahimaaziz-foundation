<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getProfile(){
        return view('backend.dashboard.teacher.profile.profile');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'phone' => 'required',
        //     'email' => 'required|email|unique:teachers,email',
        //     'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
        //     'password_confirmation' => 'required|min:8'
        // ]);

        // $data = new Admin();
        // $data->name = $request->name;
        // $data->email = $request->email;
        // $data->mobile = $request->mobile;
        // $data->password = Hash::make($request->password);
        // $image = $request->file('image');
        // if ($image) {
        //     $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploaded/admin'), $imageName);
        //     $data->profile_photo_path = '/uploaded/admin/' . $imageName;
        // }
        // $data->save();

        // $notification = array(
        //     'message' => 'Admin created successfully!',
        //     'alert-type' => 'success'
        // );
        // return redirect()->route('admin.index')->with($notification);
    }

    public function edit($id)
    {
        $data = Teacher::find($id);
        return view('backend.dashboard.teacher.profile.edit-profile',compact('data'));
       
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
            
        ]);

        $data = Teacher::find($id);
        $data->name             = $request->name;
        $data->email            = $request->email;
        $data->phone            = $request->phone;
        $data->gender           = $request->gender;
        $data->date_of_birth    = $request->date_of_birth;
        $data->marital_status   = $request->marital_status;
        $data->father_name      = $request->father_name;
        $data->mother_name      = $request->mother_name;
        $data->qualification    = $request->qualification;
        $data->designation      = $request->designation;
        $data->c_address        = $request->c_address;
        $data->p_address        = $request->p_address;
        $data->date_of_joining  = $request->date_of_joining;
        
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid(). '.' . $image->getClientOriginalExtension();
            $image_path = $data->profile_photo_path;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/teacher'), $imageName);
            $data->profile_photo_path = '/uploaded/teacher/' . $imageName;
        }

        $data->save();
   

        $notification = array(
            'message' => 'Teacher updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('teacher.profile')->with($notification);
    }

    public function cPassword()
    {
        return view('backend.dashboard.teacher.profile.edit-password');
    }

    public function upassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);
        //return $request->all();
        
        if (Auth::attempt(['id' => Auth('teacher')->user()->id, 'password' => $request->current_password])){
            $user = Teacher::find(Auth('teacher')->user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            $notification = array(
                'message' => 'Successfully password changed.',
                'alert-type' => 'success'
            );
            return redirect()->route('teacher.profile')->with($notification);
        } else {
            $notification = array(
                'message' => 'Sorry! Your current password dost not match.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
