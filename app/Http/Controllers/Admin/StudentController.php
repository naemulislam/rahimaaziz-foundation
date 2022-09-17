<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Educlass;
use App\Models\Section;
use App\Models\Student;
use App\Models\Studentadmission;
use App\Models\StudentInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Str;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::where('status',1)->get();
        return view('backend.dashboard.admin.student-info.student-list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dashboard.admin.student-info.create-student');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        ]);

        $data = new Student();
        $data->name = $request->name;
        $data->slug = Str::Slug($request->name);
        $data->email = $request->email;
        $data->email_verified_at = Carbon::now();
        $data->phone = $request->phone;
        $data->password = Hash::make($request->password);

        $image = $request->file('profile_photo_path');
            if ($image) {
              $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
              $image->move(public_path('uploaded/student'), $imageName);
              $data->profile_photo_path = '/uploaded/student/' . $imageName;
            }
        
        $data->save();

        $info = new StudentInfo();
        $info->student_id = $data->id;
        $info->gender = $request->gender;
        $info->save();

        $notification = array(
            'message' => 'Register successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $data['student'] = Student::where('slug',$slug)->first();
        $id = $data['student']->id;
        $data['studentinfo'] = StudentInfo::where('student_id',$id)->first();
        $data['get_admission'] = Studentadmission::where('student_id',$id)->first();
        return view('backend.dashboard.admin.student-info.student-dtls',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data['student'] = Student::where('slug',$slug)->first();
        // $id = $data['student']->id;
        // $data['studentinfo'] = StudentInfo::where('student_id',$id)->first();
        return view('backend.dashboard.admin.student-info.edit-student',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            
            
        ]);
        if($request->password){
            $this->validate($request, [
                
                'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'required|min:8'
            ]);

        }

        $data = Student::find($id);
        $data->name                 = $request->name;
        $data->slug                 = Str::slug($request->name);
        $data->email                = $request->email;
        $data->phone                = $request->phone;
        if(!empty($request->password)){

            $data->password         = Hash::make($request->password);
        }
      

        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $iamge_path = $data->profile_photo_path;
            @unlink(public_path($iamge_path));
            $image->move(public_path('uploaded/student'), $imageName);
            $data->profile_photo_path = '/uploaded/student/' . $imageName;
        }
        $data->save();
        $notification = array(
            'message' => 'Student registration updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.student.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Student deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
    public function status(Request $request, $id)
    {
        $data = Student::find($id);
        if($request->status == 1){
            $data->status = $request->status;
        }else{
            $data->status = 0;
        }

        $data->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
