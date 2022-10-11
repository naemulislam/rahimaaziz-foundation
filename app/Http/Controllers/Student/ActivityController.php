<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Studentadmission;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){
        $student = Studentadmission::where('status',1)
        ->where('student_id',auth('student')->user()->id)->first();
        //return $student;
       
        return view('backend.dashboard.student.activity.index-activity',compact('student'));
    }
    public function show($id){
        $data['student'] = Studentadmission::find($id);
        $get_id = $data['student']->id;
        $data['get_name'] = $data['student']->student->name;
        $data['activity'] = Activity::where('admission_id',$get_id)->first();
        // return $data;
        return view('backend.dashboard.student.activity.show-activity', $data);

    }
}
