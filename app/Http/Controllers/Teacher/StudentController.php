<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Studentadmission;
use App\Models\StudentInfo;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data['students'] = Student::where('status',1)->get();
        return view('backend.dashboard.teacher.student-info.student-list',$data);
    }

    public function show($slug)
    {

        $data['student'] = Student::where('slug',$slug)->first();
        $id = $data['student']->id;
        $data['studentinfo'] = StudentInfo::where('student_id',$id)->first();
        $data['get_admission'] = Studentadmission::where('student_id',$id)->first();
        return view('backend.dashboard.teacher.student-info.student-dtls',$data);
    }
}
