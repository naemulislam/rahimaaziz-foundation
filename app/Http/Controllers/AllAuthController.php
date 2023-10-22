<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Educlass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AllAuthController extends Controller
{

    public function adminLogin(){

        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('auth.admin.login');


    }

    public function adminloginstore(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            $notification = array(
                'message'=>'You are Logged in as Admin!',
                'alert-type'=>'success',
            );
            return redirect()->route('admin.dashboard')
                ->with($notification);
        }
        $notification = array(
            'message'=>'Oppes! You have entered invalid credentials',
            'alert-type'=>'warning',
        );
        return redirect()->route('admin.login')->with($notification);
    }

    public function adminlogout(Request $request){
        Auth::guard('admin')->logout();
        $notification = array(
            'message'=>'Admin has been logged out!',
            'alert-type'=>'success',
        );
        return redirect()
            ->route('admin.login')
            ->with($notification);
    }

    //Accontant Login Function
    public function accountantLogin(){
        if(Auth::guard('accountant')->check()){
            return redirect()->route('accountant.dashboard');
        }
        return view('auth.accountant.login');

    }

    public function accountantloginstore(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('accountant')->attempt($request->only('email', 'password'))) {
            $notification = array(
                'message'=>'You are Logged in as Accountant!',
                'alert-type'=>'success',
            );
            return redirect()->route('accountant.dashboard')
                ->with($notification);
        }
        $notification = array(
            'message'=>'Oppes! You have entered invalid credentials',
            'alert-type'=>'warning',
        );

        return redirect()->route('accountant.login')->with($notification);
    }

    public function accountantlogout(Request $request){

        Auth::guard('accountant')->logout();
        $notification = array(
            'message'=>'Accountant has been logged out!',
            'alert-type'=>'success',
        );
        return redirect()
            ->route('accountant.login')
            ->with($notification);
    }

    //Hr Login Function

    public function hrLogin(){
        if(Auth::guard('hr')->check()){
            return redirect()->route('hr.dashboard');
        }
        return view('auth.hr.login');
    }

    public function hrloginstore(Request $request){

        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('hr')->attempt($request->only('email', 'password'))) {

            return redirect()
                ->route('hr.dashboard')
                ->with('status', 'You are Logged in as Hr!');
        }
        return redirect()->route('hr.login')->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function hrlogout(Request $request){
        Auth::guard('hr')->logout();
        return redirect()
            ->route('hr.login')
            ->with('status', 'Hr has been logged out!');
    }

    //Student Login Function

    public function studentLogin(){
        if(Auth::guard('student')->check()){
            return redirect()->route('student.dashboard');
        }
        return view('frontend.layout.login-page.student');
    }

    public function studentloginstore(Request $request){
        // dd($request->all());
        //  return Hash::make('student123');
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('student')->attempt($request->only('email', 'password'))) {
            $notification = array(
                'message'=>'You are Logged in as Student!',
                'alert-type'=>'success',
            );
            return redirect()
                ->route('student.dashboard')
                ->with($notification);
        }
        $notification = array(
            'message'=>'Oppes! You have entered invalid credentials',
            'alert-type'=>'warning',
        );
        return redirect()->route('schoolportal')->with($notification);
    }

    public function studentlogout(Request $request){
        Auth::guard('student')->logout();
        $notification = array(
            'message'=>'Student has been logged out!',
            'alert-type'=>'success',
        );
        return redirect()
            ->route('schoolportal')
            ->with($notification);
    }

    //Teacher Login Function
    public function teacherLogin(){
        if(Auth::guard('teacher')->check()){
            return redirect()->route('teacher.dashboard');
        }
        $class_groups = Educlass::where('status',1)->get();
        return view('auth.teacher.login',compact('class_groups'));
    }

    public function teacherloginstore(Request $request){

        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $getStatus = Teacher::where('email',$request->email)->first();
        if($getStatus->status == 1){

            if (Auth::guard('teacher')->attempt($request->only('email', 'password'))) {
                $notification = array(
                    'message'=>'You are Logged in as Teacher!',
                    'alert-type'=>'success',
                );

                return redirect()
                    ->route('teacher.dashboard')
                    ->with($notification);
            }
            $notification = array(
                'message'=>'Oppes! You have entered invalid credentials',
                'alert-type'=>'warning',
            );
            return redirect()->route('teacher.login')->with($notification);
        }else{
            $notification = array(
                'message'=>'Oppes! Your account has been deactivated!',
                'alert-type'=>'warning',
            );
            return redirect()->route('teacher.login')->with($notification);
        }


    }

    public function teacherlogout(Request $request){
        Auth::guard('teacher')->logout();
        $notification = array(
            'message'=>'Teacher has been logged out!',
            'alert-type'=>'success',
        );
        return redirect()
            ->route('teacher.login')
            ->with($notification);
    }
    // public function userlogout(Request $request){
    //     Auth::guard('user')->logout();
    //     return redirect()
    //         ->route('user.login')
    //         ->with('status', 'Teacher has been logged out!');
    // }
}
