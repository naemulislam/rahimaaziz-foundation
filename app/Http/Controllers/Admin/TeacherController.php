<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Educlass;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherResponsibility;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['teachers'] = Teacher::latest()->get();
        return view('backend.dashboard.admin.teacher-info.list-teacher',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['class'] = Educlass::where('status',1)->get();

        return view('backend.dashboard.admin.teacher-info.create-teacher',$data);
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
            'email' => 'required|unique:teachers,email,',
            'phone' => 'required',
            'class_id' => 'required',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        ]);

        $generate_id  = random_int(10000000, 99999999);
        $data = new Teacher();
        $data->id_number            = $generate_id;
        $data->name                 = $request->name;
        $data->slug                 = Str::slug($request->name);
        $data->email                = $request->email;
        $data->email_verified_at    = now();
        $data->phone                = $request->phone;
        $data->class_id             = $request->class_id;
        $data->gender               = $request->gender;
        $data->password             = Hash::make($request->password);


        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/teacher'), $imageName);
            $data->profile_photo_path = '/uploaded/teacher/' . $imageName;
        }
        $data->save();
        $notification = array(
            'message' => 'Teacher added successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.teacher.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // $data['categorys'] = Category::where('status',1)->get();
        // $data['subjects'] = Subject::where('status',1)->get();
        $data['teacher'] = Teacher::where('slug',$slug)->first();
        return view('backend.dashboard.admin.teacher-info.dtls-teacher',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data['class'] = Educlass::where('status',1)->get();
        // $data['subjects'] = Subject::where('status',1)->get();
        $data['teacher'] = Teacher::where('slug',$slug)->first();
        return view('backend.dashboard.admin.teacher-info.edit-teacher',$data);
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
            'email' => 'required',
            'phone' => 'required',
            'class_id' => 'required',
            'gender' => 'required',

        ]);
        if($request->password){
            $this->validate($request, [

                'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'required|min:8'
            ]);

        }


        $data = Teacher::find($id);
        $data->name                 = $request->name;
        $data->slug                 = Str::slug($request->name);
        $data->email                = $request->email;
        $data->phone                = $request->phone;
        $data->class_id             = $request->class_id;
        $data->gender               = $request->gender;
        if(!empty($request->password)){

            $data->password         = Hash::make($request->password);
        }


        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $iamge_path = $data->profile_photo_path;
            @unlink(public_path($iamge_path));
            $image->move(public_path('uploaded/teacher'), $imageName);
            $data->profile_photo_path = '/uploaded/teacher/' . $imageName;
        }
        $data->save();
        $notification = array(
            'message' => 'Teacher updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.teacher.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Teacher::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Teacher deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function status(Request $request, $id)
    {
        $data = Teacher::find($id);
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

    //In this function for teacher responsiblity
    public function responsIndex(){
        $data['respons'] = TeacherResponsibility::all();
        return view('backend.dashboard.admin.teacher-respons.index',$data);
    }
    public function responsCreate(){
        $data['teachers'] = Teacher::where('status',1)->get();
        return view('backend.dashboard.admin.teacher-respons.create',$data);
    }
    public function responsStore(Request $request){
        $this->validate($request,[
            'teacher_id'=>'required',
            'respons_date'=>'required',
            'responsibility'=>'required',
        ]);
        $data = new TeacherResponsibility();
        $data->teacher_id = $request->teacher_id;
        $data->respons_date = $request->respons_date;
        $data->responsibility = $request->responsibility;
        $data->save();
        $notification = array(
            'message' => 'Responsibility has been inserted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function responsEdit($id){
        $data['respons'] = TeacherResponsibility::find($id);
        $data['teachers'] = Teacher::where('status',1)->get();
        return view('backend.dashboard.admin.teacher-respons.edit',$data);
    }
    public function responsUpdate(Request $request, $id){
        $this->validate($request,[
            'teacher_id'=>'required',
            'respons_date'=>'required',
            'responsibility'=>'required',
        ]);
        $data = TeacherResponsibility::find($id);
        $data->teacher_id = $request->teacher_id;
        $data->respons_date = $request->respons_date;
        $data->responsibility = $request->responsibility;
        $data->save();
        $notification = array(
            'message' => 'Responsibility has been updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function responsDelete($id){
        $data = TeacherResponsibility::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Responsibility has been deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
