<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Studentadmission;

class StudentActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categorys'] = Category::where('status',1)->get();
        $data['students'] = Studentadmission::where('status',1)->get();
       
        return view('backend.dashboard.admin.activity.index-activity', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categorys'] = Category::where('status', 1)->get();
        return view('backend.dashboard.admin.activity.create-activity',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id'=>'required',
            'class_id'=>'required',
            'student_id'=>'required',
            'edurating'=>'required',
            'educomment'=>'required',
            'biharating'=>'required',
            'bihacomment'=>'required',
        ]);
        $get_id = Activity::where('admission_id',$request->student_id)->first();
        if($get_id){
            $notification = array(
                'message' => 'This student activity is created.!',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);

        }else{
            $data = new Activity();
        $data->category_id = $request->category_id;
        $data->class_id = $request->class_id;
        $data->admission_id = $request->student_id;
        $data->edurating = $request->edurating;
        $data->educomment = $request->educomment;
        $data->biharating = $request->biharating;
        $data->bihacomment = $request->bihacomment;
        $data->save();

        $notification = array(
            'message' => 'Student Activity Added successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['student']= Studentadmission::find($id);
        $get_id = $data['student']->id;
        $data['get_name'] = $data['student']->student->name;
        $data['activity']= Activity::where('admission_id',$get_id)->first();
        // return $data;
        return view('backend.dashboard.admin.activity.show-activity', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['student']= Studentadmission::find($id);
        $get_id = $data['student']->id;
        $data['get_name'] = $data['student']->student->name;
        $data['activity']= Activity::where('admission_id',$get_id)->first();
        return view('backend.dashboard.admin.activity.edit-activity', $data);
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
        $this->validate($request,[
            'edurating'=>'required',
            'educomment'=>'required',
            'biharating'=>'required',
            'bihacomment'=>'required'
        ]);

        $data = Activity::find($id);
        $data->edurating = $request->edurating;
        $data->educomment = $request->educomment;
        $data->biharating = $request->biharating;
        $data->bihacomment = $request->bihacomment;
        $data->save();

        $notification = array(
            'message' => 'Student Activity Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actidelete($id)
    {
        $dataadmiss= Studentadmission::find($id);
        $get_id = $dataadmiss->id;
        $data = Activity::where('admission_id',$get_id)->first();
        $data->delete();
        $notification = array(
            'message' => 'Student Activity Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        
    }

    public function activityCreate($id){
        $data = Studentadmission::find($id);
        return view('backend.dashboard.admin.activity.create',compact('data'));
    }
    public function activityStore(Request $request){

        $this->validate($request,[
            
            'edurating'=>'required',
            'educomment'=>'required',
            'biharating'=>'required',
            'bihacomment'=>'required',
        ]);
        $get_student = Studentadmission::where('student_id',$request->student_id)->first();

        $data = new Activity();
        $data->category_id = $get_student->category_id;
        $data->class_id = $get_student->class_id;
        $data->admission_id = $get_student->id;
        $data->edurating = $request->edurating;
        $data->educomment = $request->educomment;
        $data->biharating = $request->biharating;
        $data->bihacomment = $request->bihacomment;
        $data->save();

        $notification = array(
            'message' => 'Student Activity Added successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.activity.index')->with($notification);
        


    }

    public function findActivity(Request $request){
        $this->validate($request,[
            'category_id'=>'required',
            'class_id'=>'required',
        ]);

        $data['categorys'] = Category::where('status',1)->get();
        $data['students'] = Studentadmission::where('class_id',$request->class_id)->where('status',1)->get();
    
        return view('backend.dashboard.admin.activity.index-activity', $data);

    }
}
