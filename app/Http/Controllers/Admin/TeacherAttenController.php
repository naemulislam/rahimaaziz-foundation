<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Educlass;
use App\Models\Teacher;
use App\Models\TeacherAttendance;
use PDF;
use Illuminate\Http\Request;

class TeacherAttenController extends Controller
{
    public function index()
    {
        $data['get_dates'] = TeacherAttendance::select('attendance_date')->distinct()->get();

        //return $$date['get_dates'];
        return view('backend.dashboard.admin.teacher-atten.index-list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['class_group'] = Educlass::where('status', 1)->get();
        $data['teachers'] = Teacher::where('status', 1)->get();
        return view('backend.dashboard.admin.teacher-atten.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        if (!empty($request->attendance)) {

            $count_teacher = Teacher::where('status', 1)->count();

            $count_atten = count($request->attendance);

            if ($count_teacher == $count_atten) {

                $check_date = TeacherAttendance::where('attendance_date', $request->attendance_date)->first();
                if ($check_date) {
                    $notification = array(
                        'message' => 'Attendance already taken!',
                        'alert-type' => 'info'
                    );

                    return redirect()->back()->with($notification);
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
                $notification = array(
                    'message' => 'Teacher attendance missing!',
                    'alert-type' => 'info'
                );

                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Please select teacher attendance!',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        }

        $notification = array(
            'message' => 'Attendance inserted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function show($id)
    {
        //
        // $get_students = Attendance::where('attendance_date',$id)->get();
        // return $get_students;
    }
    public function atten_show($date)
    {
        //
        $get_teachers = TeacherAttendance::where('attendance_date', $date)->get();
        return view('backend.dashboard.admin.teacher-atten.index-atten', compact('get_teachers'));
    }


    public function edit($id)
    {
        //
    }


    public function atten_update(Request $request)
    {
        //return $request->atten_id;
        if (!empty($request->attendance)) {

            foreach ($request->attendance as $attenId => $attendence) {
                //foreach ($request->atten_id as $studentid => $attend_id) {

                $data = TeacherAttendance::where('id', $attenId)->first();
                $data->attendence_status = $attendence;
                $data->save();
                //}
            }
        } else {
            $notification = array(
                'message' => 'Please select student attendance!',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        }

        $notification = array(
            'message' => 'Attendance updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function atten_delete($date)
    {
        $get_teachers = TeacherAttendance::where('attendance_date', $date)->get();

        $get_teachers->each->delete();
        $notification = array(
            'message' => 'Attendance delete successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Teacher Attendance Export function
    //In this function for all class sheet
    public function allClass()
    {
        $data['allclass'] = Educlass::all();
        return view('backend.dashboard.admin.teacher-atten.all-class', $data);
    }
    //In this function for teacher sheet
    public function allTeacherSheet($class)
    {
        $data['allteachers'] = Teacher::where('class_id', $class)->where('status', 1)->get();
        // $get_id = $data['allteachers']->id;
        // $data['getAtten'] = TeacherAttendance::
        //return $data['allteachers'];
        return view('backend.dashboard.admin.teacher-atten.all-teacher', $data);
    }
    //In this function for teacher sheet export data in pdf.
    public function exportPdf()
    {
        $allteachers = Teacher::all();
        $pdf = PDF::loadView('backend.dashboard.admin.teacher-atten.all-teacher', compact('allteachers'));
        return $pdf->download('teacher_attendance.pdf');
    }
}
