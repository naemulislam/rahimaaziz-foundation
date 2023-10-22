<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Illuminate\support\Facades\Hash;
use Validator;

class RegisterController extends Controller
{
    //
    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'category_id' => 'required',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        ]);

        $data = new Teacher();
        $data->name = $request->name;
        $data->slug = Str::Slug($request->name);
        $data->email = $request->email;
        $data->email_verified_at = Carbon::now();
        $data->phone = $request->phone;
        $data->category_id = $request->category_id;
        $data->subject_id = $request->subject_id;
        $data->password = Hash::make($request->password);
        
        $data->save();

        $notification = array(
            'message' => 'Register successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
