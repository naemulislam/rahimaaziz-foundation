<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Children;
use App\Models\Studentadmission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Parent_;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['parents'] = User::latest()->get();
        return view('backend.dashboard.admin.parent.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['students'] = Studentadmission::where('status', 1)->get();
        return view('backend.dashboard.admin.parent.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        ]);
        //return $request->student_id;
        if (!empty($request->student_id)) {
            $data = new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->email_verified_at = Carbon::now();
            $data->phone = $request->phone;
            $data->gender = $request->gender;
            $data->address = $request->address;
            $data->password = Hash::make($request->password);

            $image = $request->file('profile_photo_path');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/paretn'), $imageName);
                $data->profile_photo_path = '/uploaded/paretn/' . $imageName;
            }

            $data->save();

            foreach ($request->student_id as $student) {
                $child = new Children();
                $child->student_id = $student;
                $child->parent_id = $data->id;
                $child->save();
            }
        } else {
            $notification = array(
                'message' => 'Please select student!',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }

        $notification = array(
            'message' => 'Parent has been successfully!',
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
        $data = User::find($id);
        // $child = Children::where('parent_id',$data->id)->get();
        // return $child;
        return view('backend.dashboard.admin.parent.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = User::find($id);
        $data['childs'] = Children::select('student_id')->where('parent_id',$id)->get()->toArray();
        //return $data['childs']->parent_id;
        $data['students'] = Studentadmission::where('status', 1)->get();
        return view('backend.dashboard.admin.parent.edit',$data);
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
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'gender' => 'required',
            
            
        ]);
        if($request->password){
            $this->validate($request, [
                
                'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'required|min:8'
            ]);

        }

        $data = User::find($id);
        $data->name                 = $request->name;
        $data->email                = $request->email;
        $data->phone                = $request->phone;
        $data->address                = $request->address;
        $data->gender               = $request->gender;
        if(!empty($request->password)){

            $data->password         = Hash::make($request->password);
        }
      

        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $iamge_path = $data->profile_photo_path;
            @unlink(public_path($iamge_path));
            $image->move(public_path('uploaded/parent'), $imageName);
            $data->profile_photo_path = '/uploaded/parent/' . $imageName;
        }
        $data->save();

        if(!empty($request->student_id)){
            $child_delete = Children::where('parent_id',$id);
            $child_delete->delete();
            foreach ($request->student_id as $student) {
                $child = new Children();
                $child->student_id = $student;
                $child->parent_id = $data->id;
                $child->save();
            }
        }

        $notification = array(
            'message' => 'Parent has been updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.parent.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function status(Request $request, $id)
    {
        $data = User::find($id);
        if ($request->status == 1) {
            $data->status = $request->status;
        } else {
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
