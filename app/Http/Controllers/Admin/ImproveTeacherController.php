<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Repositories\GroupRepository;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;

class ImproveTeacherController extends Controller
{
    public function index(){
        $Teachers = TeacherRepository::query()->latest()->where('status', true)->get();
        $groups = GroupRepository::query()->where('status',1)->get();
        return view('backend.dashboard.teacher_promotion.index',compact('Teachers','groups'));
    }

    public function promoteUpdate(Request $request, Teacher $teacher){
        $request->validate([
            'group_id' =>'required'
        ]);
        $teacher->group_id = $request->group_id;
        $teacher->save();
        return back()->with('success', 'Teacher has been promoted');

    }
}
