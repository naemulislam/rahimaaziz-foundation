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
            'gender' => 'required',
            'phone' => 'required',
            'class_id' => 'required',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        ]);

        $id_date  = date('ymd');
      $id_number = Teacher::latest()->first();
      if ($id_number) {
        $removed1char = substr($id_number->id_number, 6);
        $generate_id = $stpad = $id_date . str_pad($removed1char + 1, 2, "1", STR_PAD_LEFT);
      } else {
        $generate_id = $id_date . str_pad(1, 2, "1", STR_PAD_LEFT);
      }

        $data = new Teacher();
        $data->id_number = $generate_id;
        $data->name = $request->name;
        $data->slug = Str::Slug($request->name);
        $data->email = $request->email;
        $data->email_verified_at = Carbon::now();
        $data->phone = $request->phone;
        $data->class_id = $request->class_id;
        $data->gender               = $request->gender;
        $data->password = Hash::make($request->password);
        
        $data->save();

        $notification = array(
            'message' => 'Register successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
