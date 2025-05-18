<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use App\Repositories\GroupRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

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

    // Student Report Section
    public function allReports()
    {
        $teacher_group = auth('teacher')->user()->group_id;
        $data['reports'] = DailyReport::where('group_id', $teacher_group)->get();
        return view('backend.teacher.dashboard.student-report.all_reports', $data);
    }
    public function pending()
    {
        $teacher_group = auth('teacher')->user()->group_id;
        $data['reports'] = DailyReport::where('group_id', $teacher_group)->where('teacher_review', 0)->get();
        return view('backend.teacher.dashboard.student-report.pending', $data);
    }
    public function complete()
    {
        $teacher_group = auth('teacher')->user()->group_id;
        $data['reports'] = DailyReport::where('group_id', $teacher_group)->where('teacher_review', 1)->get();
        return view('backend.teacher.dashboard.student-report.complete', $data);
    }
    public function incomplete()
    {
        $teacher_group = auth('teacher')->user()->group_id;
        $data['reports'] = DailyReport::where('group_id', $teacher_group)->where('teacher_review', 2)->get();
        return view('backend.teacher.dashboard.student-report.incomplete', $data);
    }
    public function rejected()
    {
        $teacher_group = auth('teacher')->user()->group_id;
        $data['reports'] = DailyReport::where('group_id', $teacher_group)->where('teacher_review', 3)->get();
        return view('backend.teacher.dashboard.student-report.rejected', $data);
    }
    public function showReport(DailyReport $dailyReport)
    {
        $data['report'] = $dailyReport;
        return view('backend.teacher.dashboard.student-report.show', $data);
    }
    public function status(Request $request, DailyReport $dailyReport)
    {
        $request->validate([
            'teacher_review' => 'required',
        ]);
        $$dailyReport->teacher_review = $request->teacher_review;
        $$dailyReport->save();

        return back()->with('success', 'Report status updated successfully');

    }
}
