<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherResponsibility;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;

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
        return view('backend.teacher.dashboard.respons.index',$data);
    }
    public function responsStatus(Request $request, TeacherResponsibility $teacherResponsibility)
    {
        $request->validate([
            'status' => 'required|string'
        ]);
        $teacherResponsibility->update([
            'status' => $request->status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }




}
