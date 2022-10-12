<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Educlass;
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
        return view('backend.dashboard.admin.attendance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categorys'] = Category::where('status', 1)->get();
        // $data['classes'] = Educlass::where('status',1)->get();
        // $data['subjects'] = Subject::where('status',1)->get();
        // $data['subjects'] = Subject::where('status',1)->get();
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
        $data = $request->all();
        // $this->validate($request, [
        //     'category_id' => 'required',
        //     'class_id' => 'required',
        //     'subject_id' => 'required',
        //     'attendance_date' => 'required',
        //     'attendance_time' => 'required'
        // ]);


        foreach ($data['admi_id'] as $key => $service) {
            Attendance::create([
                'admission_id' => $service,
                'category_id' => $request->category_id,
                'class_id' => $request->class_id,
                'subject_id' => $request->subject_id,
                'section_id' => $request->subject_id,
                'attendance_date' => $request->attendance_date,
                'attendance_time' => $request->attendance_time,
                'p_a' => $data['pa'][$key],
            ]);
        }

      
        $notification = array(
            'message' => 'Attendance Inserted successfully!',
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
    public function update(Request $request, $id)
    {
        //
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
}
