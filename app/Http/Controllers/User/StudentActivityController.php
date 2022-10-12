<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Studentadmission;
use Illuminate\Http\Request;

class StudentActivityController extends Controller
{
    public function index()
    {
        $data['categorys'] = Category::where('status',1)->get();
        $data['students'] = Studentadmission::where('status',1)->get();
       
        return view('backend.dashboard.parent.activity.index-activity', $data);

    }

    public function show($id)
    {
        $data['student']= Studentadmission::find($id);
        $get_id = $data['student']->id;
        $data['get_name'] = $data['student']->student->name;
        $data['activity']= Activity::where('admission_id',$get_id)->first();
        return view('backend.dashboard.parent.activity.show-activity', $data);
    }

    public function findActivity(Request $request){
        $this->validate($request,[
            'category_id'=>'required',
            'class_id'=>'required',
        ]);

        $data['categorys'] = Category::where('status',1)->get();
        $data['students'] = Studentadmission::where('class_id',$request->class_id)->where('status',1)->get();
    
        return view('backend.dashboard.parent.activity.index-activity', $data);

    }
}
