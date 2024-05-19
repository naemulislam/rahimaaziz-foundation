<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeacherAttendance;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;

class TeacherAttenController extends Controller
{
    public function index()
    {
        $data['get_dates'] = TeacherAttendance::select('attendance_date')->distinct()->get();
        return view('backend.dashboard.teacher-atten.index', $data);
    }

    public function create()
    {
        $data['teachers'] = TeacherRepository::query()->where('status', 1)->get();
        return view('backend.dashboard.teacher-atten.create', $data);
    }

    public function store(Request $request)
    {
        if (!empty($request->attendance)) {

            $countTeacher = TeacherRepository::query()->where('status', true)->count();

            $countAtten = count($request->attendance);

            if ($countTeacher == $countAtten) {

                $checkDate = TeacherAttendance::where('attendance_date', $request->attendance_date)->first();
                if ($checkDate) {

                    return back()->with('info', 'Today\'s Attendance already taken!');
                } else {
                    $this->validate($request, [
                        'attendance_date' => 'required',
                        'attendance_time' => 'required'
                    ]);

                    foreach ($request->attendance as $teacherid => $attendence) {

                        TeacherAttendance::create([
                            'teacher_id'        => $teacherid,
                            'attendance_date'   => $request->attendance_date,
                            'attendance_time'   => $request->attendance_time,
                            'attendence_status' => $attendence
                        ]);
                    }
                }
            } else {

                return back()->with('warning', 'Teacher are missing!');
            }
        } else {

            return back()->with('warning', 'Please select teacher attendance!');
        }

        return back()->with('success', 'Attendance is created successfully!');
    }

    public function show($date)
    {
        $get_teachers = TeacherAttendance::where('attendance_date', $date)->get();
        return view('backend.dashboard.teacher-atten.edit', compact('get_teachers'));
    }


    public function update(Request $request)
    {
        if (!empty($request->attendance)) {

            foreach ($request->attendance as $attenId => $attendence) {

                $data = TeacherAttendance::where('id', $attenId)->first();
                $data->attendence_status = $attendence;
                $data->save();
            }
        } else {

            return back()->with('warning', 'Please select student attendance!');
        }

        return back()->with('success', 'Attendance is updated successfully!');
    }

    public function destroy($date)
    {
        $getTeachers = TeacherAttendance::where('attendance_date', $date)->get();
        $getTeachers->each->delete();

        return back()->with('success', 'Attendance is deleted successfully!');
    }
}
