<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use App\Models\DaiyRepost;
use App\Models\Studentadmission;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_stu = Studentadmission::where('student_id',auth('student')->user()->id)->first();
        $data['reports'] = DailyReport::where('admission_id',$get_stu->id)->latest()->get();
        return view('backend.dashboard.student.report.report-index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dashboard.student.report.submit-report');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required',
            'report_date' => 'required',
            'page_number' => 'required',
            'para_number' => 'required',
            'report_type' => 'required|in:1,2,3'
           

        ]);

        $get_stu = Studentadmission::where('student_id',auth('student')->user()->id)->first();

        $get_class_id = $get_stu->class_id;
        

        $data = new DailyReport();
        $data->admission_id =  $get_stu->id;
        $data->class_id = $get_class_id;
        $data->subject_name = $request->subject_name;
        $data->report_date = $request->report_date;
        $data->report_type = $request->report_type;
        $data->para = $request->para_number;
        $data->description = $request->description;
        
        $paraSum1 = DailyReport::where('admission_id',$get_stu->id)->where('class_id',$get_stu->class_id)
        ->where('para',$request->para_number)
        ->where('report_type',1)
        ->where('teacher_review',1)
        ->sum('page');
        if($paraSum1 == 20){
            $notification = array(
                'message' => 'Jug Already Completed!',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }else{
            $data->page = $request->page_number;
        }

        $image = $request->image;
        if ($image) {
            $imgName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/daily_report'), $imgName);
            $data->image = 'uploaded/daily_report/' . $imgName;
        }
        $data->save();

        $notification = array(
            'message' => 'Daily report Submitted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.report.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DailyReport::find($id);
        return view('backend.dashboard.student.report.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DailyReport::find($id);
        return view('backend.dashboard.student.report.report-edit',compact('data'));
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
        $request->validate([
            'subject_name' => 'required',
            'report_date' => 'required',
            'page_number' => 'required',
            'para_number' => 'required',
            'report_type' => 'required|in:1,2,3'

        ]);

      
        $data = DailyReport::find($id);
        $data->subject_name = $request->subject_name;
        $data->report_date = $request->report_date;
        $data->page = $request->page_number;
        $data->para = $request->para_number;
        $data->report_type = $request->report_type;
        $data->description = $request->description;
        $image = $request->image;
        if ($image) {
            $imgName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->image;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/daily_report'), $imgName);
            $data->image = 'uploaded/daily_report/' . $imgName;
        }
        $data->save();

        $notification = array(
            'message' => 'Daily report updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.report.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reportDelete($id)
    {
        $data = DailyReport::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Daily report has been deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    
}
