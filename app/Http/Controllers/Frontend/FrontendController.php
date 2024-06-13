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
use App\Repositories\AchievementRepository;
use App\Repositories\AdmissionRepository;
use App\Repositories\CampusRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\GroupRepository;
use App\Repositories\NewsRepository;
use App\Repositories\NoticeRepository;
use App\Repositories\OnlineAdmissionRepository;
use App\Repositories\ProgramRepository;
use App\Repositories\SliderRepository;
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
        $data['sliders'] = SliderRepository::query()->where('status', true)->orderBy('order', 'asc')->get();
        $data['campuses'] = CampusRepository::query()->where('status', true)->orderBy('order', 'asc')->get();
        $data['notices'] = NoticeRepository::query()->latest()->where('status', true)->take(4)->get();
        $data['programs'] = ProgramRepository::query()->where('status', true)->latest()->take(4)->get();
        $data['achievements'] = AchievementRepository::query()->where('status', true)->latest()->take(6)->get();
        $data['newses'] = NewsRepository::query()->latest()->where('status', true)->take(6)->get();
        return view('frontend.home', $data);
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
        return view('frontend.aboutus');
    }

    public function admission()
    {
        $data['activitys'] = ActivityList::orderBy('order', 'asc')->get();
        $data["groups"] = GroupRepository::query()->where('status', 1)->orderBy('order', 'asc')->get();
        return view('frontend.admission', $data);
    }
    // get group ,registration fee ,monthly fee and vacant
    public function getGroup($id)
    {
        $group = GroupRepository::query()->where('id', $id)->where('status', true)->first();
        $studentAreAdmited = AdmissionRepository::query()->where('group_id', $group->id)->count();
        $vacant = $group->vacant - $studentAreAdmited;
        if($vacant == 0){
            $vacant = '';
        }
        $html = '';
        $html .= '<div class="col-md-4">
                    <div class="announcement">
                        <h4>Registration Fee: $' . $group->reg_fee . '</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="announcement">
                        <h4>Monthly Fee: $' . $group->monthly_fee . '</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="announcement">
                        <h4>Seats are Available: ' . $vacant . '</h4>
                    </div>
                </div>';
        return $html;
    }
    //Team members method
    public function teamMember()
    {
        return view('frontend.team');
    }
    //gallery method
    public function gallery()
    {
        $data['galleries'] = GalleryRepository::query()->latest()->where('status', true)->get();
        return view('frontend.gallery', $data);
    }
    //notice method
    public function notice()
    {
        $data['notices'] = NoticeRepository::query()->latest()->where('status', true)->get();
        return view('frontend.notice', $data);
    }
    //programs method
    public function programs()
    {
        $data['programs'] = ProgramRepository::query()->where('status', true)->latest()->get();
        return view('frontend.programs', $data);
    }
    //programDetails method
    public function programDetails($slug)
    {
        $program = ProgramRepository::query()->where('slug', $slug)->first();
        return view('frontend.program_details', compact('program'));
    }
    //achivements method
    public function achivements()
    {
        $data['achievements'] = AchievementRepository::query()->where('status', true)->latest()->get();
        return view('frontend.achivement', $data);
    }
    //achivementDetails method
    public function achivementDetails($slug)
    {
        $achievement = AchievementRepository::query()->where('slug', $slug)->first();
        return view('frontend.achivement_details', compact('achievement'));
    }
    //news method
    public function news()
    {
        $data['newses'] = NewsRepository::query()->latest()->where('status', true)->get();
        return view('frontend.news', $data);
    }
    //newsDetails method
    public function newsDetails($slug)
    {
        $news = NewsRepository::query()->where('slug', $slug)->first();
        return view('frontend.news_details', compact('news'));
    }
    //Online Admission for student
    public function onlineAdmissionStore(OnlineAdmissionRequest $request)
    {
        // $group = GroupRepository::query()->where('id', $request->group_id)->where('status', true)->first();
        // $studentAreAdmited = AdmissionRepository::query()->where('group_id', $group->id)->count();

            $student = StudentRepository::onlineAdmissionCreate($request);
            OnlineAdmissionRepository::storeByRequest($request, $student->id);
            StudentInfoRepository::onlineAdmissionDetails($request, $student->id);

            return back()->with('success', 'Admission request is Successfully send.');

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
