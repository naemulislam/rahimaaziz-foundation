<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:students,email,' . $id,
            'phone' => 'required'
            
        ]);

        $data = User::find($id);
       
        $data->name            = $request->name;
        $data->email            = $request->email;
        $data->phone            = $request->phone;
        $data->address            = $request->address;
      
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->profile_photo_path;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/parent'), $imageName);
            $data->profile_photo_path = '/uploaded/parent/' . $imageName;
        }

        $data->save();

        $notification = array(
            'message' => 'Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }

    public function cPassword()
    {
        return view('backend.dashboard.parent.profile.edit-password');
    }

    public function upassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'min:9|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:9'
        ]);
        
        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            $notification = array(
                'message' => 'Successfully password changed.',
                'alert-type' => 'success'
            );
            return redirect()->route('dashboard')->with($notification);
        } else {
            $notification = array(
                'message' => 'Sorry! Your current password dost not match.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
