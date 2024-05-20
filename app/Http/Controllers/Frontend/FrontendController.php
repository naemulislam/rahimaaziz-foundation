<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Educlass;
use App\Models\Prayer;
use App\Models\Setting;
use App\Models\Staff;
use App\Models\Student;
use App\Models\User;
use App\Repositories\GroupRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }
    //Contact page and contact data store
    public function contact()
    {
        return view('frontend.contact');
    }
    public function contactStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->save();
        return back()->with('success', 'Message Send Successfully');
    }
    //End contact
    public function aboutUs()
    {
        $data['staffs'] = Staff::where('status', 1)->latest()->get();
        $data['prayers'] = Prayer::where('status', 1)->Orderby('order', 'asc')->get();
        return view('frontend.aboutus', $data);
    }

    public function admission()
    {
        if (auth('student')->user()) {
            $data["groups"] = GroupRepository::query()->where('status', 1)->get();

            return view('frontend.admission', $data);

        } elseif (auth('teacher')->user() || auth('admin')->user() || auth()->user()) {

            return redirect()->back()->with('info', 'Please at first log in as a student');

        } else {

            return redirect()->route('signin.portal')->with('info', 'Please at first you neet to login as student!');
        }
    }
    public function paymentPage(Request $request)
    {
        // $this->validate($request,[
        //     'category_id'=> 'required',
        //     'class_id'=> 'required',
        //     'name'=> 'required',
        //     'admission_date'=> 'required',
        //     'date_of_birth'=> 'required',
        //     'place_of_birth'=> 'required',
        //     'gender'=> 'required',
        //     'admi_photo'=> 'required',
        //     'h_address'=> 'required',
        //     'city'=> 'required',
        //     'state'=> 'required',
        //     'zip_code'=> 'required',
        //     'father_name'=> 'required',
        //     'father_call'=> 'required',
        //     'mother_name'=> 'required',
        //     'mother_call'=> 'required'
        // ]);
        $data = [];
        $data['category_id'] = $request->category_id;
        $data['class_id '] = $request->class_id;
        $data['admission_date '] = $request->admission_date;
        $data['date_of_birth '] = $request->date_of_birth;
        $data['place_of_birth '] = $request->place_of_birth;
        $data['admi_phone '] = $request->admi_phone;
        $data['gender '] = $request->gender;
        $data['admi_photo '] = $request->admi_photo;
        $data['h_address '] = $request->h_address;
        $data['city '] = $request->city;
        $data['state '] = $request->state;
        $data['zip_code '] = $request->zip_code;
        $data['father_name '] = $request->father_name;
        $data['father_call '] = $request->father_call;
        $data['mother_name '] = $request->mother_name;
        $data['mother_call '] = $request->mother_call;



        // $data = [];
        // $data['admission_date'] = '01-09-2022';
        // $data['date_of_birth'] = '10-10-2003';
        // $data['place_of_birth'] = 'Bangladesh';
        // $data['name'] = 'Naemul Islam';

        return view('frontend.checkout.checkout', compact('data'));
    }
    public function signinPortal()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::guard('teacher')->check()) {
            return redirect()->route('teacher.dashboard');
        } elseif (Auth::guard('student')->check()) {
            return redirect()->route('student.dashboard');
        } elseif (Auth::guard()->check()) {
            return redirect()->route('dashboard');
        } else {
            return view('frontend.layout.signin.signin');
        }
    }
    // Student and parent Signup page and signup store method
    public function signupPortal()
    {
        return view('frontend.layout.signup.signup');
    }
    public function signupStore(Request $request)
    {
        $email = 'required|email|unique:students,email';
        if ($request->user_type == 'parent') {
            $email = 'required|email|unique:users,email';
        }
        $this->validate($request, [
            'user_type' => 'required|in:student,parent',
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required|in:male,female',
            'email' => $email,
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        ]);
        if ($request->user_type == 'parent') {
            $data = new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->email_verified_at = Carbon::now();
            $data->phone = $request->phone;
            $data->gender = $request->gender;
            $data->password = Hash::make($request->password);

            $data->save();
        } else {
            $data = new Student();
            $data->name = $request->name;
            $data->slug = Str::Slug($request->name);
            $data->email = $request->email;
            $data->email_verified_at = Carbon::now();
            $data->phone = $request->phone;
            $data->gender = $request->gender;
            $data->status_type = 0;
            $data->password = Hash::make($request->password);

            $data->save();
        }
        Auth::login();
        return back()->with('success', 'Register successfully!');
    }
    //End signup method
}
