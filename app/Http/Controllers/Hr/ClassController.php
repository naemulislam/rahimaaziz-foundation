<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Educlass;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Auth;
use Validator;

class ClassController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::where('status',1)->get();
        $data = Educlass::latest()->get();
        return view('backend.dashboard.hr.academic.category.index-class',compact('data','categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'category_id'=> 'required',
            'class_name' => 'required|unique:educlasses,class_name'
            
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Educlass();
        $data->category_id = $request->category_id;
        $data->class_name = $request->class_name;
        $data->slug = Str::slug($request->class_name);
        $data->order = $request->order;

       $data->save();

        $notification = array(
            'message' => 'Class created successfully!',
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
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|unique:educlasses,class_name',
            
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = Educlass::find($id);
        $data->category_id = $request->category_id;
        $data->class_name = $request->class_name;
        $data->order = $request->order;
        $data->group = $request->group;

        $data->slug = Str::slug($request->class_name);
       
        $data->save();

        $notification = array(
            'message' => 'Class updated successfully!',
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
    public function destroy($id)
    {
        $data = Educlass::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Class deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function status(Request $request, $id)
    {
        $data = Educlass::find($id);
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
