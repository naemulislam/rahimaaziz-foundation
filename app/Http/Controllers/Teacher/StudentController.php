<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Repositories\GroupRepository;
use App\Repositories\StudentRepository;

class StudentController extends Controller
{
    public function index()
    {
        $group = request()->group_id;
        if ($group) {
            $admissionStudent = StudentRepository::query()
                ->whereHas('admission', function ($query) use ($group) {
                    $query->where('group_id', $group);
                })
                ->where('status', true)
                ->where('admission_status', true)
                ->where('status_type', 1)->get();
        } else {
            $admissionStudent = StudentRepository::query()
                ->where('status', true)
                ->where('admission_status', true)
                ->where('status_type', 1)->get();
        }

        $groups = GroupRepository::query()->where('status', true)->get();
        return view('backend.teacher.dashboard.student-info.student_list', compact('admissionStudent', 'groups'));
    }

    public function show($slug)
    {
        $data['student'] = StudentRepository::query()->where('slug', $slug)->first();
        return view('backend.teacher.dashboard.student-info.student_dtls', $data);
    }
}
