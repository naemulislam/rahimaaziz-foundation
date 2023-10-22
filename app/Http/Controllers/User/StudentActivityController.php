<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityDetails;
use App\Models\Category;
use App\Models\Children;
use App\Models\StudentActivity;
use App\Models\Studentadmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentActivityController extends Controller
{
    public function index()
    {
        $data['children'] = Children::where('parent_id',Auth::user()->id)->get();
        $data['countChildren'] = Children::where('parent_id',Auth::user()->id)->count();
       
        return view('backend.dashboard.parent.activity.child', $data);

    }

    public function show($id)
    {
        $stu = Children::find($id);
        $data['student'] = Studentadmission::where('id',$stu->student_id)->first();
        $getId = $data['student'];

        $data['getActivity'] = StudentActivity::where('admission_id',$getId->id)->where('class_id',$getId->class_id)->get();
        return view('backend.dashboard.parent.activity.index-activity', $data);
    }
    public function activityShow($id)
    {
        $data['activity'] = StudentActivity::find($id);
        $getId = $data['activity']->id;
        $data['activitylist'] = ActivityDetails::where('activity_id',$getId)->get();
        return view('backend.dashboard.parent.activity.show-activity', $data);
    }

    
}
