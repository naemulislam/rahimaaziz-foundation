<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Educlass;
use App\Models\Prayer;
use App\Models\Setting;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class FrontendController extends Controller
{
    //
    public function index(){
       
        return view('frontend.home');
    }
    public function contact(){
       
        return view('frontend.contact');
    }
    public function aboutUs(){
        $data['staffs'] = Staff::where('status',1)->latest()->get();
        $data['prayers'] = Prayer::where('status',1)->Orderby('order','asc')->get();
        return view('frontend.aboutus',$data);
    }
    
    public function admission(){
        if(auth('student')->user()){
            $data["classes"] = Educlass::where('status',1)->get();

            return view('frontend.admission',$data);

        }elseif(auth('teacher')->user() || auth('hr')->user()||auth('accountant')->user()||auth('admin')->user()||auth('principle')->user()||auth()->user()){
            $notification = array(
                'message' => 'Please at first log in as a student',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Please at first you neet to login!',
                'alert-type' => 'info'
            );
            return redirect()->route('schoolportal')->with($notification);
        }
    }
    public function paymentPage(Request $request){
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
            $data['admission_date '] =$request->admission_date;
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

        return view('frontend.checkout.checkout',compact( 'data'));
    }
    public function SchoolPortal(){

        
        return view('frontend.layout.login-page.student');
    }
    public function Userlogin(){
        return view('frontend.layout.login-page.user-login');
    }
}
