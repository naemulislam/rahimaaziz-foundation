<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Homework;
use App\Models\Studentadmission;
use App\Models\Subject;
use App\Models\Submitwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_stu = Studentadmission::where('student_id',auth('student')->user()->id)->first();
        $get_class_id = $get_stu->class_id;
        $data['homeworks'] = Homework::where('class_id',$get_class_id)->latest()->get();
        return view('backend.dashboard.student.homework.homework', $data);
    }
    public function Hwindex()
    {
      
        $get_student_id = auth('student')->user()->id;
        $data['hws'] = Submitwork::where('student_id',$get_student_id)->latest()->get();
        return view('backend.dashboard.student.homework.hw-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homeworkcreate($id)
    {
        $get_stu = Studentadmission::where('student_id',auth('student')->user()->id)->first();
        $get_class_id = $get_stu->class_id;

        $data['homework'] = Homework::find($id);

        $data["subjects"] = Subject::where('status',1)->where('class_id', $get_class_id)->get();
        return view('backend.dashboard.student.homework.add-work', $data);
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
            'subject_id' => 'required',
            'title' => 'required',
            'homework_date' => 'required',
            'submission_date' => 'required',
            'description' => 'required'

        ]);

        $get_stu = Studentadmission::where('student_id',auth('student')->user()->id)->first();
        $get_category_id = $get_stu->category_id;
        $get_class_id = $get_stu->class_id;
        $get_section_id = $get_stu->section_id;

        $data = new Submitwork();
        $data->hw_id =  $request->hw_id;
        $data->student_id =  Auth('student')->user()->id;
        $data->category_id =  $get_category_id;
        $data->class_id = $get_class_id;
        $data->subject_id = $request->subject_id;
        $data->section_id = $get_section_id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->homework_date = $request->homework_date;
        $data->submission_date = $request->submission_date;
        $image = $request->image;
        if ($image) {
            $imgName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/submitwork'), $imgName);
            $data->image = 'uploaded/submitwork/' . $imgName;
        }
        $data->save();

        $notification = array(
            'message' => 'Homework Submitted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.hw.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Homework::find($id);
        return view('backend.dashboard.student.homework.show',compact('data'));
    }
    public function homeworkshow($id)
    {
        $data = Submitwork::find($id);
        return view('backend.dashboard.student.homework.hw-show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get_stu = Studentadmission::where('student_id',auth('student')->user()->id)->first();
        $get_class_id = $get_stu->class_id;

        
        $data["subjects"] = Subject::where('status',1)->where('class_id', $get_class_id)->get();
        $data['homework'] = Submitwork::find($id);
        return view('backend.dashboard.student.homework.hw-edit', $data);
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
            'subject_id' => 'required',
            'title' => 'required',
            'homework_date' => 'required',
            'submission_date' => 'required',
            'description' => 'required'

        ]);

        

        $data = Submitwork::find($id);
        $data->subject_id = $request->subject_id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->homework_date = $request->homework_date;
        $data->submission_date = $request->submission_date;
        $image = $request->image;
        if ($image) {
            $imgName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->image;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/submitwork'), $imgName);
            $data->image = 'uploaded/submitwork/' . $imgName;
        }
        $data->save();

        $notification = array(
            'message' => 'Homework Updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.hw.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function homeworkdestroy($id)
    {
        $data = Submitwork::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Homework delete successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
