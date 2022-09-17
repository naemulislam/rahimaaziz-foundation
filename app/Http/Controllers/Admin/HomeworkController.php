<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Homework;
use App\Models\Student;
use App\Models\Studentadmission;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['homeworks'] = Homework::latest()->get();
        return view('backend.dashboard.admin.homework.homework', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["categorys"] = Category::where('status', 1)->get();
        $data["students"] = Studentadmission::where('status', 1)->get();
        return view('backend.dashboard.admin.homework.add-work', $data);
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
            'student_id' => 'required',
            'category_id' => 'required',
            'class_id' => 'required',
            'subject_id' => 'required',
            'title' => 'required',
            'homework_date' => 'required',
            'submission_date' => 'required',
            'description' => 'required'

        ]);

        $data = new Homework();
        $data->student_id = $request->student_id;
        $data->category_id = $request->category_id;
        $data->class_id = $request->class_id;
        $data->subject_id = $request->subject_id;
        $data->section_id = $request->section_id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->homework_date = $request->homework_date;
        $data->submission_date = $request->submission_date;
        $image = $request->image;
        if ($image) {
            $imgName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/homework'), $imgName);
            $data->image = 'uploaded/homework/' . $imgName;
        }
        $data->save();

        $notification = array(
            'message' => 'Homework uploaded successfully!',
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
        $data = Homework::find($id);
        return view('backend.dashboard.admin.homework.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["categorys"] = Category::where('status', 1)->get();
        $data["students"] = Studentadmission::where('status', 1)->get();
        $data['homework'] = Homework::find($id);
        return view('backend.dashboard.admin.homework.edit',$data);
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
            'student_id' => 'required',
            'category_id' => 'required',
            'class_id' => 'required',
            'subject_id' => 'required',
            'title' => 'required',
            'homework_date' => 'required',
            'submission_date' => 'required',
            'description' => 'required'

        ]);

        $data = Homework::find($id);
        $data->student_id = $request->student_id;
        $data->category_id = $request->category_id;
        $data->class_id = $request->class_id;
        $data->subject_id = $request->subject_id;
        $data->section_id = $request->section_id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->homework_date = $request->homework_date;
        $data->submission_date = $request->submission_date;
        $image = $request->image;
        if ($image) {
            $imgName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->iamge;
            @unlink(public_path($image_path ));
            $image->move(public_path('uploaded/homework'), $imgName);
            $data->image = 'uploaded/homework/' . $imgName;
        }
        $data->save();

        $notification = array(
            'message' => 'Homework updated successfully!',
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
    public function homeworkdestroy($id)
    {
        $data = Homework::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Homework deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
