<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherResponsibility;
use App\Repositories\TeacherRepository;

class TeacherController extends Controller
{

    public function index()
    {
        $data['teachers'] = TeacherRepository::query()->where('status',1)->latest()->get();
        return view('backend.teacher.dashboard.teacher-info.teacher_index',$data);
    }
    public function show($slug)
    {
        $data['teacher'] = TeacherRepository::query()->where('slug',$slug)->first();
        return view('backend.teacher.dashboard.teacher-info.teacher_details',$data);
    }
    public function responsIndex()
    {

        $data['respons'] = TeacherResponsibility::where('teacher_id',Auth('teacher')->user()->id)->get();
        return view('backend.dashboard.teacher.respons.index',$data);
    }




}
