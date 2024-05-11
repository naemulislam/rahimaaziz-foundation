<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function portalLoginStore(Request $request)
    {
        $request->validate([
            'user_role' => 'required|in:student,parent,teacher,admin',
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($request->user_role == 'student') {

            if (Auth::guard('student')->attempt($request->only('email', 'password'))) {
                return redirect()->route('student.dashboard')->with('success', 'You are Logged in as Student!');
            }else{
                return back()->with('error', 'Oppes! You have entered invalid credentials!');
            }

        } elseif ($request->user_role == 'parent') {

            if (Auth::attempt($request->only('email', 'password'))) {
                return redirect()->route('dashboard')->with('success', 'You are Logged in as Parent!');
            }else{
                return back()->with('error', 'Oppes! You have entered invalid credentials!');
            }
        } elseif ($request->user_role == 'teacher') {

            if (Auth::guard('teacher')->attempt($request->only('email', 'password'))) {
                return redirect()->route('teacher.dashboard')->with('success', 'You are Logged in as Teacher!');
            }else{
                return back()->with('error', 'Oppes! You have entered invalid credentials!');
            }
        } else {
            //Admin
            if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
                return redirect()->route('admin.dashboard')->with('success', 'You are Logged in as Admin!');
            }else{
                return back()->with('error', 'Oppes! You have entered invalid credentials!');
            }

        }
    }
    //Student Logout method
    public function studentLogout(Request $request){
        Auth::guard('student')->logout();
        return redirect()->route('signin.portal')->with('success', 'Student has been logged out!');
    }
    //Parent Logout method
    public function parentLogout(Request $request){
        auth()->logout();
        return redirect()->route('signin.portal')->with('success', 'Parent has been logged out!');
    }
    //Teacher Logout method
    public function teacherLogout(Request $request){
        Auth::guard('teacher')->logout();
        return redirect()->route('signin.portal')->with('success', 'Teacher has been logged out!');
    }
    //Admin Logout method
    public function AdminLogout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('signin.portal')->with('success', 'Admin has been logged out!');
    }
}
