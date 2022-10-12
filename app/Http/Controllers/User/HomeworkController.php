<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Homework;
use App\Models\Studentadmission;
use App\Models\Submitwork;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function index()
    {
        $data['categorys'] = Category::where('status',1)->get();
        
        $data['homeworks'] = Homework::latest()->get();
        return view('backend.dashboard.parent.homework.homework', $data);
    }



    public function findHomework(Request $request){
       
        $this->validate($request,[
            'category_id'=>'required',
            'class_id'=>'required',
        ]);

        $data['categorys'] = Category::where('status',1)->get();
        $data['homeworks'] = Homework::where('class_id',$request->class_id)->latest()->get();
    
        return view('backend.dashboard.parent.homework.homework', $data);

    }


    public function Complate_Hwindex()
    {
      
        // $get_student_id = auth('student')->user()->id;
        $data['hws'] = Submitwork::latest()->get();
        return view('backend.dashboard.parent.homework.hw-index', $data);
    }

    public function show($id)
    {
        $data = Homework::find($id);
        return view('backend.dashboard.parent.homework.show',compact('data'));
    }
    public function homeworkshow($id)
    {
        $data = Submitwork::find($id);
        return view('backend.dashboard.parent.homework.hw-show',compact('data'));
    }
}
