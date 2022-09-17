<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->route('admin.dashboard')
                ->with('status', 'You are Logged in as Admin!');
        }

        return redirect()->route('admin.login')->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function adminlogout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('status', 'Admin has been logged out!');
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
            return redirect()->route('accountant.dashboard')
                ->with('status', 'You are Logged in as Admin!');
        }

        return redirect()->route('admin.login')->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function accountantlogout(Request $request){

        Auth::guard('accountant')->logout();
        return redirect()
            ->route('accountant.login')
            ->with('status', 'Accountant has been logged out!');
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

    //Principle Login Function

    public function principleLogin(){
        if(Auth::guard('principle')->check()){
            return redirect()->route('principle.dashboard');
        }
        return view('auth.principle.login');
    }

    public function principleloginstore(Request $request){

        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('principle')->attempt($request->only('email', 'password'))) {
            return redirect()
                ->route('principle.dashboard')
                ->with('status', 'You are Logged in as Principle!');
        }
        return redirect()->route('principle.login')->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function principlelogout(Request $request){
        Auth::guard('principle')->logout();
        return redirect()
            ->route('principle.login')
            ->with('status', 'Principle has been logged out!');
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
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('student')->attempt($request->only('email', 'password'))) {

            return redirect()
                ->route('student.dashboard')
                ->with('status', 'You are Logged in as Student!');
        }
        return redirect()->route('schoolportal')->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function studentlogout(Request $request){
        Auth::guard('student')->logout();
        return redirect()
            ->route('schoolportal')
            ->with('status', 'Student has been logged out!');
    }

    //Teacher Login Function
    public function teacherLogin(){
        if(Auth::guard('teacher')->check()){
            return redirect()->route('teacher.dashboard');
        }
        $categorys = Category::where('status',1)->get();
        return view('auth.teacher.login',compact('categorys'));
    }

    public function teacherloginstore(Request $request){

        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('teacher')->attempt($request->only('email', 'password'))) {

            return redirect()
                ->route('teacher.dashboard')
                ->with('status', 'You are Logged in as Teacher!');
        }
        return redirect()->route('teacher.login')->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function teacherlogout(Request $request){
        Auth::guard('teacher')->logout();
        return redirect()
            ->route('teacher.login')
            ->with('status', 'Teacher has been logged out!');
    }
    // public function userlogout(Request $request){
    //     Auth::guard('user')->logout();
    //     return redirect()
    //         ->route('user.login')
    //         ->with('status', 'Teacher has been logged out!');
    // }
}
