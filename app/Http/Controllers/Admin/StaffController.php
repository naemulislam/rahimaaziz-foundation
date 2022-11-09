<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["staffs"] = Staff::latest()->get();
        return view("backend.dashboard.admin.staff.list-staff",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.dashboard.admin.staff.create-staff");
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
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
            'description' => 'required'

        ]);

        $data = new Staff();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->department = $request->department;
        $data->description = $request->description;

        $image = $request->image;
        if ($image) {
            $imgName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/about/staff'), $imgName);
            $data->image = 'uploaded/about/staff/' . $imgName;
        }
        $data->save();

        $notification = array(
            'message' => 'Staff uploaded successfully!',
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
        $data = Staff::find($id);
        return view("backend.dashboard.admin.staff.dtls-staff",compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Staff::find($id);
        return view("backend.dashboard.admin.staff.edit-staff",compact('data'));
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
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
            'description' => 'required'

        ]);

        $data = Staff::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->department = $request->department;
        $data->description = $request->description;

        $image = $request->image;
        if ($image) {
            $imgName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = public_path($data->image);
            @unlink($image_path);

            $image->move(public_path('uploaded/about/staff'), $imgName);
            $data->image = 'uploaded/about/staff/' . $imgName;
        }
        $data->save();

        $notification = array(
            'message' => 'Staff updated successfully!',
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
        $data = Staff::find($id);
        $image_path = public_path($data->image);
        @unlink($image_path);
        $data->delete();
        $notification = array(
            'message' => 'Staff deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function status(Request $request, $id)
    {
        $data = Staff::find($id);
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
