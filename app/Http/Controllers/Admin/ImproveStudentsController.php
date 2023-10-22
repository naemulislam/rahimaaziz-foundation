<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Educlass;
use App\Models\Studentadmission;
use Illuminate\Http\Request;

class ImproveStudentsController extends Controller
{
    public function index(){
        $data = Studentadmission::latest()->where('status',1)->get();
        $classs = Educlass::where('status',1)->get();
        return view('backend.dashboard.admin.improve-student.student-index',compact('data','classs'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'class_id' =>'required',
            'roll' =>'required'
        ]);
        $data = Studentadmission::find($id);
        $data->class_id = $request->class_id;
        $data->roll = $request->roll;
        $data->save();

        $notification = array(
            'message'=>'Student has been improved!',
            'alert-type' => "success"
        );
        return redirect()->back()->with($notification);
 
    }
}
