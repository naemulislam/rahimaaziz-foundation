<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Educlass;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Auth;
use Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["categorys"] = Category::where('status',1)->get();
        $data["classs"] = Educlass::where('status',1)->get();
        $data["subjects"] = Subject::latest()->get();
        return view('backend.dashboard.admin.subject.index-subject',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["categorys"] = Category::where('status',1)->get();
        $data["classs"] = Educlass::where('status',1)->get();
        return view('backend.dashboard.admin.subject.subject-add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sub_name' => 'required',
            'sub_code' => 'required',
            'category_id' => 'required',
            'class_id' => 'required',
            
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Subject();
        $data->sub_name     = $request->sub_name;
        $data->slug         = Str::slug($request->sub_name);
        $data->sub_code     = $request->sub_code;
        $data->category_id  = $request->category_id;
        $data->class_id     = $request->class_id;
        $data->order        = $request->order;
        $image = $request->file('image');
      if ($image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploaded/subject'), $imageName);
        $data->image = '/uploaded/subject/' . $imageName;
      }
        $data->save();

        $notification = array(
            'message' => 'Subject created successfully!',
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
    public function edit($slug)
    {
        $data["categorys"] = Category::where('status',1)->get();
        $data["classs"] = Educlass::where('status',1)->get();
        $data["subject"] = Subject::where('slug',$slug)->first();
        return view('backend.dashboard.admin.subject.edit-subject',$data);
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
        $validator = Validator::make($request->all(), [
            'sub_name' => 'required',
            'sub_code' => 'required',
            'category_id' => 'required',
            'class_id' => 'required',
            
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = Subject::find($id);
        $data->sub_name     = $request->sub_name;
        $data->slug         = Str::slug($request->sub_name);
        $data->sub_code     = $request->sub_code;
        $data->category_id  = $request->category_id;
        $data->class_id     = $request->class_id;
        $data->teacher_name = $request->teacher_name;
        $data->order        = $request->order;
        $data->save();

        $notification = array(
            'message' => 'Subject updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.subject.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Subject::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Subject deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
    public function status(Request $request, $id)
    {
        $data = Subject::find($id);
        if($request->status == 1){
            $data->status = $request->status;
        }else{
            $data->status = 0;
        }

        $data->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
