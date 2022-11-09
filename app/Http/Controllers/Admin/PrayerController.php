<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prayer;
use Illuminate\Http\Request;

class PrayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prayers = Prayer::Orderby('order','asc')->latest()->get();
        return view("backend.dashboard.admin.prayer.list-prayer",compact('prayers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.dashboard.admin.prayer.create-prayer");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'order' => 'required',
        ]);
        $data = new Prayer();
        $data->name = $request->name;
        $data->start_time = $request->start_time;
        $data->end_time = $request->end_time;
        $data->order = $request->order;
        //dd($data);
        $data->save();

        $notification = array(
            'message' => 'Prayer Inserted successful!',
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
        $prayer = Prayer::find($id);
        return view("backend.dashboard.admin.prayer.edit-prayer",compact('prayer'));
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
        $this->validate($request,[
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'order' => 'required',
        ]);
        $data = Prayer::find($id);
        $data->name = $request->name;
        $data->start_time = $request->start_time;
        $data->end_time = $request->end_time;
        $data->order = $request->order;
        $data->save();

        $notification = array(
            'message' => 'Prayer updated successful!',
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
        $data = Prayer::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Prayer deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function status(Request $request, $id)
    {
        $data = Prayer::find($id);
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
