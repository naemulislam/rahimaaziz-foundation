<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use App\Models\Accountant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AccountantController extends Controller
{
    public function getProfile(){
        return view('backend.dashboard.accountant.profile.profile');
    }
    public function index()
    {
        // $data['datas'] = Accountant::latest()->get();
        // return view('backend.dashboard.admin.profile.index-admin',$data);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6'
        ]);

        $data = new Accountant();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->password = Hash::make($request->password);
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/admin'), $imageName);
            $data->profile_photo_path = '/uploaded/admin/' . $imageName;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('accountant.index')->with($notification);
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
        $data = Accountant::find($id);
        return view('backend.dashboard.accountant.profile.edit-profile',compact('data'));
       
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
            'email' => 'required|unique:admins,email,' . $id,
            'phone' => 'required'
            
        ]);

        $data = Accountant::find($id);
        $data->name             = $request->name;
        $data->email            = $request->email;
        $data->phone            = $request->phone;
        $data->ec_number        = $request->ec_number;
        $data->gender           = $request->gender;
        $data->date_of_birth    = $request->date_of_birth;
        $data->marital_status   = $request->marital_status;
        $data->father_name      = $request->father_name;
        $data->mother_name      = $request->mother_name;
        $data->qualification    = $request->qualification;
        $data->designation      = $request->designation;
        $data->c_address        = $request->c_address;
        $data->p_address        = $request->p_address;
        $data->department       = $request->department;
        $data->basic_salary     = $request->basic_salary;
        $data->work_shift       = $request->work_shift;
        $data->work_exprince    = $request->work_exprince;
        $data->data_of_joining  = $request->data_of_joining;
        
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->profile_photo_path;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/accountant'), $imageName);
            $data->profile_photo_path = '/uploaded/accountant/' . $imageName;
        }

        $data->save();
   

        $notification = array(
            'message' => 'Accountant updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('accountant.profile')->with($notification);
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
        return view('backend.dashboard.accountant.profile.edit-password');
    }

    public function upassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'min:9|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:9'
        ]);
        
        if (Auth::attempt(['id' => Auth('accountant')->user()->id, 'password' => $request->current_password])){
            $user = Accountant::find(Auth('accountant')->user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            $notification = array(
                'message' => 'Successfully password changed.',
                'alert-type' => 'success'
            );
            return redirect()->route('accountant.dashboard')->with($notification);
        } else {
            $notification = array(
                'message' => 'Sorry! Your current password dost not match.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
