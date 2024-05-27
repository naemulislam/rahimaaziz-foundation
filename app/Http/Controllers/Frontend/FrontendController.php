<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OnlineAdmissionRequest;
use App\Models\ActivityList;
use App\Models\Contact;
use App\Models\Prayer;
use App\Models\Staff;
use App\Models\Student;
use App\Models\User;
use App\Repositories\GroupRepository;
use App\Repositories\OnlineAdmissionRepository;
use App\Repositories\StudentInfoRepository;
use App\Repositories\StudentRepository;
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
        $data['activitys'] = ActivityList::orderBy('order', 'asc')->get();
        $data["groups"] = GroupRepository::query()->where('status', 1)->orderBy('order', 'asc')->get();
        return view('frontend.admission', $data);
    }
    //Team members method
    public function teamMember(){
        return view('frontend.team');
    }
    //gallery method
    public function gallery(){
        return view('frontend.gallery');
    }
    //notice method
    public function notice(){
        return view('frontend.notice');
    }
    //programs method
    public function programs(){
        return view('frontend.programs');
    }
    //programDetails method
    public function programDetails(){
        return view('frontend.program_details');
    }
    //achivements method
    public function achivements(){
        return view('frontend.achivement');
    }
    //achivementDetails method
    public function achivementDetails(){
        return view('frontend.achivement_details');
    }
    //news method
    public function news(){
        return view('frontend.news');
    }
    //newsDetails method
    public function newsDetails(){
        return view('frontend.news_details');
    }
    public function onlineAdmissionStore(OnlineAdmissionRequest $request)
    {
        $student = StudentRepository::onlineAdmissionCreate($request);
        OnlineAdmissionRepository::storeByRequest($request, $student->id);
        StudentInfoRepository::onlineAdmissionDetails($request, $student->id);

        return redirect()->back()->with('success', 'Admission request is Successfully send.');
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
        // Auth::login();
        return back()->with('success', 'Register successfully!');
    }
    //End signup method
}
