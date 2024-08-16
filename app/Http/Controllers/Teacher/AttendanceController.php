<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Educlass;
use App\Models\Studentadmission;
use App\Models\Teacher;
use App\Models\TeacherAttendance;
use App\Repositories\AdmissionRepository;
use App\Repositories\GroupRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $getDates = Attendance::select('attendance_date', 'group_id')->distinct()->where('group_id', Auth('teacher')->user()->group_id)->get();
        return view('backend.teacher.dashboard.attendance.index',compact('getDates'));
    }

    public function create()
    {
        $data['students'] = AdmissionRepository::query()
            ->whereHas('student', function ($query) {
                $query->where('status', true)->where('admission_status', true)->where('status_type', 1);
            })->where('group_id', Auth('teacher')->user()->group_id)->Orderby('roll', 'asc')->get();

        return view('backend.teacher.dashboard.attendance.create', $data);
    }

    public function store(Request $request)
    {

        if (!empty($request->attendance)) {

            $count_student = AdmissionRepository::query()
            ->whereHas('student', function ($query) {
                $query->where('status', true)->where('admission_status', true)->where('status_type', 1);
            })->where('group_id', Auth('teacher')->user()->group_id)->count();

            $count_atten = count($request->attendance);

            if ($count_student == $count_atten) {

                $checkDate = Attendance::where('attendance_date', $request->attendance_date)->where('group_id', $request->group_id)->first();
                if ($checkDate) {
                    return back()->with('info', 'Student\'s Attendance already taken!');
                } else {
                    $this->validate($request, [
                        'attendance_date' => 'required',
                        'attendance_time' => 'required'
                    ]);

                    foreach ($request->attendance as $studentid => $attendence) {
                        Attendance::create([
                            'admission_id'      => $studentid,
                            'group_id'          => $request->group_id,
                            'attendance_date'   => $request->attendance_date,
                            'attendance_time'   => $request->attendance_time,
                            'attendence_status' => $attendence
                        ]);
                    }
                }
            } else {
                return back()->with('warning', 'Student are missing!');
            }
        } else {
            return back()->with('warning', 'Please select student attendance!');
        }

        return back()->with('success', 'Attendance is created successfully!');
    }

    public function show($group, $date)
    {
        $getAllAtten = Attendance::where('attendance_date', $date)->where('group_id', $group)->get();
        return view('backend.teacher.dashboard.attendance.edit', compact('getAllAtten'));
    }

    public function update(Request $request)
    {
        if (!empty($request->attendance)) {

            foreach ($request->attendance as $student => $attendence) {
                $data = Attendance::where('id', $student)->first();
                $data->attendence_status = $attendence;
                $data->save();
            }
        } else {
            return back()->with('warning', 'Please select student attendance!');
        }

        return back()->with('success', 'Attendance is updated successfully!');
    }

    public function destroy($group, $date)
    {
        $getStudents = Attendance::where('attendance_date', $date)->where('group_id', $group)->get();
        $getStudents->each->delete();
        return back()->with('success', 'Attendance is deleted successfully!');
    }


    //Teacher Attendance sho teacher panel
    public function myAttenIndex()
    {
        $getId = Teacher::where('id', Auth('teacher')->user()->id)->first();

        $data['getAtten'] = TeacherAttendance::where('teacher_id', $getId->id)->get();
        $data['class_count'] = $data['getAtten']->count();

        $data['present'] = TeacherAttendance::where('teacher_id', $getId->id)->where('attendence_status', 1)->count();
        $data['absent'] = TeacherAttendance::where('teacher_id', $getId->id)->where('attendence_status', 0)->count();
        $data['late'] = TeacherAttendance::where('teacher_id', $getId->id)->where('attendence_status', 2)->count();
        $data['sick'] = TeacherAttendance::where('teacher_id', $getId->id)->where('attendence_status', 3)->count();

        return view('backend.dashboard.teacher.my-attendance.attendance', $data);
    }
}
