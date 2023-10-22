<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherResponsibility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
   
    public function index()
    {
        $data['teachers'] = Teacher::where('status',1)->latest()->get();
        return view('backend.dashboard.teacher.teacher-info.list-teacher',$data);
    }
    public function show($slug)
    {
        // $data['categorys'] = Category::where('status',1)->get();
        // $data['subjects'] = Subject::where('status',1)->get();
        $data['teacher'] = Teacher::where('slug',$slug)->first();
        return view('backend.dashboard.teacher.teacher-info.dtls-teacher',$data);
    }
    public function responsIndex()
    {
       
        $data['respons'] = TeacherResponsibility::where('teacher_id',Auth('teacher')->user()->id)->get();
        return view('backend.dashboard.teacher.respons.index',$data);
    }

  

    
}
