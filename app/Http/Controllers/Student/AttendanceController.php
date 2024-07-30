<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Studentadmission;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //index
    public function index(){
        $getId = Studentadmission::where('student_id',Auth('student')->user()->id)->first();

        $data['getAtten'] = Attendance::where('admission_id',$getId->id)->where('group_id',$getId->class_id)->get();
        $data['class_count'] = $data['getAtten']->count();

        $data['present'] = Attendance::where('admission_id',$getId->id)->where('group_id',$getId->group_id)->where('attendence_status',1)->count();
        $data['absent'] = Attendance::where('admission_id',$getId->id)->where('group_id',$getId->group_id)->where('attendence_status',0)->count();
        $data['late'] = Attendance::where('admission_id',$getId->id)->where('group_id',$getId->group_id)->where('attendence_status',2)->count();
        $data['sick'] = Attendance::where('admission_id',$getId->id)->where('group_id',$getId->group_id)->where('attendence_status',3)->count();

        //$data['present'] = $data['presentId']->attendence_status->count();

        //return $data['getAtten']->class_id;

        // foreach($data['getAtten'] as $atten){
        //     if($atten->attendence_status == 1){
        //         $data['present'] = $atten->attendence_status;
        //     }elseif($atten->attendence_status == 0){
        //         $data['absent'] = $atten->attendence_status;

        //     }elseif($atten->attendence_status == 2){
        //         $data['late'] = $atten->attendence_status;
        //     }
        // }
        //return $data['present'];
        return view('backend.student.dashboard.attendance.attendance',$data);
    }
}
