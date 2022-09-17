<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subject;
use App\Models\Teacher;
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
        $data['teachers'] = Teacher::where('status',1)->latest()->get();
        return view('backend.dashboard.admin.teacher-info.list-teacher',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categorys'] = Category::where('status',1)->get();
        $data['subjects'] = Subject::where('status',1)->get();
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
            'category_id' => 'required',
            'subject_id' => 'required',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        ]);


        $data = new Teacher();
        $data->name                 = $request->name;
        $data->slug                 = Str::slug($request->name);
        $data->email                = $request->email;
        $data->email_verified_at    = now();
        $data->phone                = $request->phone;
        $data->category_id          = $request->category_id;
        $data->subject_id           = $request->subject_id;
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
        $data['categorys'] = Category::where('status',1)->get();
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
            'category_id' => 'required',
            'subject_id' => 'required',
            
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
        $data->category_id          = $request->category_id;
        $data->subject_id           = $request->subject_id;
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
}
