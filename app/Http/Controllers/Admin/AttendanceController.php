<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Studentadmission;
use App\Repositories\AdmissionRepository;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $data['getAttendances'] = Attendance::select('attendance_date', 'group_id')->distinct()->get();
        return view('backend.dashboard.attendance.index', $data);
    }

    public function create()
    {
        $data['groups'] = GroupRepository::query()->where('status', true)->get();
        return view('backend.dashboard.attendance.create', $data);
    }

    public function store(Request $request)
    {
        if (!empty($request->attendance)) {

            $countStudent = AdmissionRepository::query()
            ->whereHas('student', function ($query) {
                $query->where('status', true)->where('admission_status', true)->where('status_type', 1);
            })->where('group_id', Auth('teacher')->user()->group_id)->count();

            $countAtten = count($request->attendance);

            if ($countStudent == $countAtten) {

                $checkDate = Attendance::where('attendance_date', $request->attendance_date)->where('group_id', $request->group_id)->first();
                if ($checkDate) {

                    return back()->with('info', 'Student\'s Attendance already taken!');
                } else {
                    $this->validate($request, [
                        'group_id' => 'required',
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
        return view('backend.dashboard.attendance.edit', compact('getAllAtten'));
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
}
