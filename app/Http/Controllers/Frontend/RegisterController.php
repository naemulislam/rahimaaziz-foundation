<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\support\Str;
use Illuminate\support\Facades\Hash;
use Validator;

class RegisterController extends Controller
{
    public function UserRegister(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->email_verified_at = Carbon::now();
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->password = Hash::make($request->password);
        
        $data->save();

        $notification = array(
            'message' => 'Register successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
