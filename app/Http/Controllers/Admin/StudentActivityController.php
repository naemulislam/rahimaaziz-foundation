<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityDetails;
use App\Models\ActivityList;
use App\Models\Category;
use App\Models\DailyReport;
use App\Models\Educlass;
use App\Models\Student;
use App\Models\StudentActivity;
use Illuminate\Http\Request;
use App\Models\Studentadmission;

class StudentActivityController extends Controller
{
    public function index()
    {
        // $data['classs'] = Educlass::where('id', auth('teacher')->user()->class_id)->first();
        $data['activityLists'] = StudentActivity::select('activity_date', 'class_id')->distinct()->get();

        return view('backend.dashboard.admin.activity.activity-list', $data);
    }

    public function create()
    {
        $data['classes'] = Educlass::where('status',1)->get();
        $data['students'] = Studentadmission::where('status', 1)->get();
        $data['activityLIst'] = ActivityList::where('status', 1)->get();
        return view('backend.dashboard.admin.activity.create-activity', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'activity_date' => 'required',
            'student_id' => 'required',
            'edurating' => 'required',
            'educomment' => 'required',
            'biharating' => 'required',
            'bihacomment' => 'required',
        ]);
        //return $request->activitis;


        if ($request->student_id != '--Select--') {
            $findStudent = StudentActivity::where('admission_id', $request->student_id)->where('activity_date', $request->activity_date)->first();
            if ($findStudent) {
                $notification = array(
                    'message' => 'Daily Activity Already Added!',
                    'alert-type' => 'warning'
                );

                return redirect()->back()->with($notification);
            } else {
                $getClassId = Studentadmission::where('id', $request->student_id)->first();
                $data = new StudentActivity();
                $data->activity_date = $request->activity_date;
                $data->class_id =  $request->class_id;
                $data->admission_id = $request->student_id;
                $data->edurating = $request->edurating;
                $data->educomment = $request->educomment;
                $data->biharating = $request->biharating;
                $data->bihacomment = $request->bihacomment;
                $data->save();

                foreach ($request->activitis as $activity) {
                    $activitydtls = new ActivityDetails();
                    $activitydtls->list_id = $activity;
                    $activitydtls->activity_id = $data->id;
                    //$data->name = $activity;
                    $activitydtls->save();
                }


                $notification = array(
                    'message' => 'Daily Activity has been Added',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Please select a student!',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        }
    }



    public function activity_show($class, $date)
    {
        $data['activitys'] = StudentActivity::where('class_id', $class)->where('activity_date', $date)->get();
        $data['date'] = StudentActivity::where('class_id', $class)->where('activity_date', $date)->first();
        //return $data;
        return view('backend.dashboard.admin.activity.list-student', $data);
    }
    public function show($id)
    {
        $data['activity'] = StudentActivity::find($id);
        $getId = $data['activity']->id;
        $data['activitylist'] = ActivityDetails::where('activity_id',$getId)->get();
        // return $data;
        return view('backend.dashboard.admin.activity.show-activity', $data);
    }

    public function edit($id)
    {

        $data['activity'] = StudentActivity::find($id);
        return view('backend.dashboard.admin.activity.edit-activity', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'edurating' => 'required',
            'educomment' => 'required',
            'biharating' => 'required',
            'bihacomment' => 'required'
        ]);


        $data = StudentActivity::find($id);
        $data->edurating = $request->edurating;
        $data->educomment = $request->educomment;
        $data->biharating = $request->biharating;
        $data->bihacomment = $request->bihacomment;
        $data->save();

        $notification = array(
            'message' => 'Daily Activity Updated Successfully!',
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
    // In this function for delete all activity.
    public function activity_delete($class, $date)
    {

        $data = StudentActivity::where('class_id', $class)->where('activity_date', $date)->get();
        $data->each->delete();
        $notification = array(
            'message' => 'Daily Activity Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // In this function for delete specific student activity.
    public function actidelete($id)
    {

        $data = StudentActivity::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Student Activity Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Others function no need//////////////////////////////////////

    public function averageActivity()
    {
        $data['students'] = Studentadmission::Orderby('roll', 'asc')->where('status', 1)->get();

        return view('backend.dashboard.admin.activity.average-activity', $data);
    }
    
    //In this function for student report
    public function reportIndex()
    {
        $data = DailyReport::where('class_id',Auth('teacher')->user()->class_id)->get();

       return view('backend.dashboard.admin.student-report.report-index',compact('data'));
    }
    public function reportComplete()
    {
        $data = DailyReport::where('class_id',Auth('teacher')->user()->class_id)
            ->where('teacher_review',1)
            ->get();

       return view('backend.dashboard.admin.student-report.complete-report',compact('data'));
    }
    public function reportShow($id)
    {
        $data = DailyReport::find($id);
       return view('backend.dashboard.admin.student-report.show',compact('data')); 
    }
    //In this function for report status
    public function reportStatus(Request $request, $id)
    {
        $data = DailyReport::find($id);
        $data->teacher_review = $request->teacher_review;
        $data->save();
        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
