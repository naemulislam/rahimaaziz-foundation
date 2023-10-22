<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Educlass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ImproveTeacherController extends Controller
{
    public function index(){
        $data = Teacher::latest()->where('status',1)->get();
        $classs = Educlass::where('status',1)->get();
        return view('backend.dashboard.admin.improve-teacher.teacher-index',compact('data','classs'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'class_id' =>'required'
        ]);
        $data = Teacher::find($id);
        $data->class_id = $request->class_id;
        $data->save();

        $notification = array(
            'message'=>'Teacher has been improved!',
            'alert-type' => "success"
        );
        return redirect()->back()->with($notification);
 
    }
}
