<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Educlass;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Auth;
use Validator;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::where('status',1)->get();
        $classs = Educlass::where('status',1)->get();
        $data = Section::latest()->get();
        return view('backend.dashboard.admin.academic.category.index-section',compact('data','categorys','classs'));
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
            'name' => 'required',
            'category_id'=> 'required',
            'class_id'=> 'required'
            
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Section();
        $data->category_id  = $request->category_id;
        $data->class_id     = $request->class_id;
        $data->name         = $request->name;
        $data->order        = $request->order;
        $data->slug         = Str::slug($request->name);
       
        $data->save();

        $notification = array(
            'message' => 'Section created successfully!',
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
            'name' => 'required',
            'category_id'=> 'required',
            'class_id'=> 'required'
            
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data =Section::find($id);
        
        $data->name         = $request->name;
        $data->slug         = Str::slug($request->name);
        $data->category_id  = $request->category_id;
        $data->class_id     = $request->class_id;
        $data->order        = $request->order;
       
        $data->save();

        $notification = array(
            'message' => 'Section update successfully!',
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
        $data = Section::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Section deleted successfully!',
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
