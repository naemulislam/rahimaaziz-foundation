<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Children;
use App\Models\Studentadmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(){
        $data['children'] = Children::where('parent_id',Auth::user()->id)->get();
        $data['countChildren'] = Children::where('parent_id',Auth::user()->id)->count();
        return view('backend.dashboard.parent.attendance.child',$data);
    }
    public function show($id){

        $stu = Children::find($id);

        $data['student'] = Studentadmission::where('id',$stu->student_id)->first();
        $getId = $data['student'];

        $data['getAtten'] = Attendance::where('admission_id',$getId->id)->where('class_id',$getId->class_id)->get();
        //return $data['getAtten'];
        $data['class_count'] = $data['getAtten']->count();

        $data['present'] = Attendance::where('admission_id',$stu->student_id)->where('class_id',$getId->class_id)->where('attendence_status',1)->count();
        $data['absent'] = Attendance::where('admission_id',$stu->student_id)->where('class_id',$getId->class_id)->where('attendence_status',0)->count();
        $data['late'] = Attendance::where('admission_id',$stu->student_id)->where('class_id',$getId->class_id)->where('attendence_status',2)->count();
        $data['sick'] = Attendance::where('admission_id',$stu->student_id)->where('class_id',$getId->class_id)->where('attendence_status',3)->count();

        return view('backend.dashboard.parent.attendance.attendance',$data);
    }
}
