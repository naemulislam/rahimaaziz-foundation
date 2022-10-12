<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function accountInfo(){
        return view('backend.dashboard.student.profile.account-info');
    }
    public function index()
    {
        // $data['datas'] = Student::latest()->get();
        // return view('backend.dashboard.admin.profile.index-admin',$data);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('backend.dashboard.admin.profile.create-admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        // $data = Student::find($id);
        // return view('backend.dashboard.student.profile.edit-profile',compact('data'));
       
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
            'email' => 'required|unique:students,email,' . $id,
            'phone' => 'required'
            
        ]);

        $data = Student::find($id);
       
        $data->name            = $request->name;
        $data->email            = $request->email;
        $data->phone            = $request->phone;
      
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->profile_photo_path;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student'), $imageName);
            $data->profile_photo_path = '/uploaded/student/' . $imageName;
        }

        $data->save();

        $notification = array(
            'message' => 'Student updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }
    public function studenUpdate(Request $request, $id){
        $studentcount = StudentInfo::wehre('id',$id)->first();
        $rowcount = StudentInfo::wehre('id',$id)->count();

        if($rowcount == 0){

        $data = new StudentInfo();

        $data->student_id      = $data->id;
        $data->gender          = $request->gender;
        $data->date_of_birth   = $request->date_of_birth;
        $data->category        = $request->category;
        $data->religion        = $request->religion;
        $data->admission_date  = $request->admission_date;
        $data->blood           = $request->blood;
        $data->height          = $request->height;
        $data->weight          = $request->weight;
        $data->c_address       = $request->c_address;
        $data->p_address       = $request->p_address;
        $data->father_name     = $request->father_name;
        $data->father_call     = $request->father_call;
        $data->father_ocupa    = $request->father_ocupa;
        $data->father_nid      = $request->father_nid;
        $data->father_photo    = $request->father_photo;
        $data->mother_name     = $request->mother_name;
        $data->mother_call     = $request->mother_call;
        $data->mother_ocupa    = $request->mother_ocupa;
        $data->mother_nid      = $request->mother_nid;
        $data->mother_photo    = $request->mother_photo;
        $data->g_name          = $request->g_name;
        $data->g_call          = $request->g_call;
        $data->g_ocupa         = $request->g_ocupa;
        $data->e_name          = $request->e_name;
        $data->shift           = $request->shift;

        $image = $request->file('father_pohto');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->father_photo;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student/father'), $imageName);
            $data->father_photo = '/uploaded/student/father/' . $imageName;
        }
        $image = $request->file('mother_photo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->mother_photo;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student/mother'), $imageName);
            $data->mother_photo = '/uploaded/student/mother/' . $imageName;
        }
   

        $notification = array(
            'message' => 'Student updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.profile')->with($notification);

        }
        else{
            $data = StudentInfo::find($id);


        $data->gender          = $request->gender;
        $data->date_of_birth   = $request->date_of_birth;
        // $data->category        = $request->category;
        // $data->religion        = $request->religion;
        // $data->admission_date  = $request->admission_date;
        $data->blood           = $request->blood;
        $data->height          = $request->height;
        $data->weight          = $request->weight;
        $data->c_address       = $request->c_address;
        $data->p_address       = $request->p_address;
        $data->father_name     = $request->father_name;
        $data->father_call     = $request->father_call;
        $data->father_ocupa    = $request->father_ocupa;
        $data->father_nid      = $request->father_nid;
        $data->father_photo    = $request->father_photo;
        $data->mother_name     = $request->mother_name;
        $data->mother_call     = $request->mother_call;
        $data->mother_ocupa    = $request->mother_ocupa;
        $data->mother_nid      = $request->mother_nid;
        $data->mother_photo    = $request->mother_photo;
        $data->g_name          = $request->g_name;
        $data->g_call          = $request->g_call;
        $data->g_ocupa         = $request->g_ocupa;
        $data->e_name          = $request->e_name;
        $data->shift           = $request->shift;

        $image = $request->file('father_pohto');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->father_photo;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student/father'), $imageName);
            $data->father_photo = '/uploaded/student/father/' . $imageName;
        }
        $image = $request->file('mother_photo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->mother_photo;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student/mother'), $imageName);
            $data->mother_photo = '/uploaded/student/mother/' . $imageName;
        }
   

        $notification = array(
            'message' => 'Student updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.profile')->with($notification);

        }

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

    public function cPassword()
    {
        return view('backend.dashboard.student.profile.edit-password');
    }

    public function upassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);
        
        if (Auth::attempt(['id' => Auth('student')->user()->id, 'password' => $request->current_password])){
            $user = Student::find(Auth('student')->user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            $notification = array(
                'message' => 'Successfully password changed.',
                'alert-type' => 'success'
            );
            return redirect()->route('student.dashboard')->with($notification);
        } else {
            $notification = array(
                'message' => 'Sorry! Your current password dost not match.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
