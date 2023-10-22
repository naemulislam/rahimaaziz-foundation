<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Educlass;
use App\Models\Studentadmission;
use App\Models\Subject;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['get_dates'] = Attendance::select('attendance_date','class_id')->distinct()->get();

        //return $$date['get_dates'];
        return view('backend.dashboard.admin.attendance.index-list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['class_group'] = Educlass::where('status', 1)->get();
        return view('backend.dashboard.admin.attendance.create', $data);
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

            $count_student = Studentadmission::where('status', 1)->where('class_id',$request->class_id)->count();

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
        // $get_students = Attendance::where('attendance_date',$id)->get();
        // return $get_students;
    }
    public function atten_show($class, $date)
    {
        //
        $get_students = Attendance::where('attendance_date',$date)->where('class_id',$class)->get();
        return view('backend.dashboard.admin.attendance.index-atten',compact('get_students'));
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
        //return $request->atten_id;
        if (!empty($request->attendance)) {

            foreach ($request->attendance as $student => $attendence) {
            //foreach ($request->atten_id as $studentid => $attend_id) {

                $data = Attendance::where('id', $student)->first();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atten_delete($class, $date)
    {
        $get_students = Attendance::where('attendance_date',$date)->where('class_id',$class)->get();

        $get_students->each->delete();
        $notification = array(
            'message' => 'Attendance delete successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
