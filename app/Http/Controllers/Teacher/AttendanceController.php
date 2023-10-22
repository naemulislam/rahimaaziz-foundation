<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Educlass;
use App\Models\Studentadmission;
use App\Models\Teacher;
use App\Models\TeacherAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['get_dates'] = Attendance::select('attendance_date', 'class_id')->distinct()->where('class_id',Auth('teacher')->user()->class_id)->get();
        return view('backend.dashboard.teacher.attendance.index-list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['class'] = Educlass::where('status', 1)->where('id', Auth('teacher')->user()->class_id)->first();
        $data['students'] = Studentadmission::where('status', 1)->where('class_id', Auth('teacher')->user()->class_id)->Orderby('roll','asc')->get();
        return view('backend.dashboard.teacher.attendance.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!empty($request->attendance)) {

            $count_student = Studentadmission::where('status', 1)->where('class_id', Auth('teacher')->user()->class_id)->count();

            $count_atten = count($request->attendance);

            if ($count_student == $count_atten) {

                $check_date = Attendance::where('attendance_date', $request->attendance_date)->where('class_id', $request->class_id)->first();
                if ($check_date) {
                    $notification = array(
                        'message' => 'Attendance already taken!',
                        'alert-type' => 'info'
                    );

                    return redirect()->back()->with($notification);
                } else {
                    $this->validate($request, [
                        'class_id' => 'required',
                        'attendance_date' => 'required',
                        'attendance_time' => 'required'
                    ]);


                    foreach ($request->attendance as $studentid => $attendence) {

                        Attendance::create([
                            'admission_id'      => $studentid,
                            'class_id'          => $request->class_id,
                            'attendance_date'   => $request->attendance_date,
                            'attendance_time'   => $request->attendance_time,
                            'attendence_status' => $attendence
                        ]);
                    }
                }
            } else {
                $notification = array(
                    'message' => 'Student attendance missing!',
                    'alert-type' => 'info'
                );

                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Please select student attendance!',
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function atten_show($class, $date)
    {
        //
        $get_students = Attendance::where('attendance_date', $date)->where('class_id', $class)->get();
        return view('backend.dashboard.teacher.attendance.index-atten', compact('get_students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atten_update(Request $request)
    {
        if (!empty($request->attendance)) {

            foreach ($request->attendance as $studentid => $attendence) {

                $data = Attendance::where('id', $studentid)->first();
                $data->attendence_status = $attendence;
                $data->save();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //
    }
    public function atten_delete($class, $date)
    {
        $get_students = Attendance::where('attendance_date', $date)->where('class_id', $class)->get();

        $get_students->each->delete();
        $notification = array(
            'message' => 'Attendance delete successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    //Teacher Attendance sho teacher panel
    public function myAttenIndex(){
        $getId = Teacher::where('id',Auth('teacher')->user()->id)->first();

        $data['getAtten'] = TeacherAttendance::where('teacher_id',$getId->id)->get();
        $data['class_count'] = $data['getAtten']->count();

        $data['present'] = TeacherAttendance::where('teacher_id',$getId->id)->where('attendence_status',1)->count();
        $data['absent'] = TeacherAttendance::where('teacher_id',$getId->id)->where('attendence_status',0)->count();
        $data['late'] = TeacherAttendance::where('teacher_id',$getId->id)->where('attendence_status',2)->count();
        $data['sick'] = TeacherAttendance::where('teacher_id',$getId->id)->where('attendence_status',3)->count();

        return view('backend.dashboard.teacher.my-attendance.attendance',$data);
    }
}
