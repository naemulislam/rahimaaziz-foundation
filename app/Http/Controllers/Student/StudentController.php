<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentInfo;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function accountInfo(){
        return view('backend.student.dashboard.profile.account-info');
    }
    public function profile()
    {
        return view('backend.student.dashboard.profile.profile');
    }

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

    public function cPassword()
    {
        return view('backend.student.dashboard.profile.edit-password');
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
    //Admission fee payment method
    public function admissionFeeStore(Request $request, Student $student){
        // return $request->all();
        $registratonFee = GroupRepository::query()->where('id', $student->admission->group_id)->first();

        $fee_amount = $registratonFee->reg_fee;

         \Stripe\Stripe::setApiKey('sk_test_51KUbT6LEylh30WQ8Mlb1wvxGBMq8Sm8YGm70jQGt7mbxv0zdYrG3wMsT2SrjuJYt3g93MPGQj0DJwnFVBHN3rOdw00wlXBiHEP');

            $token = $_POST['stripeToken'];

            $charge = \Stripe\Charge::create([
                'amount' => $fee_amount * 100,
                'currency' => 'usd',
                'description' => 'Payment to Rahima Aziz',
                'source' => $token,
                'metadata' => ['order_id' => uniqid()],
            ]);
            //innovative it , inspirad solution
            $pMethod = $charge->payment_method;
            $balanceTransaction = $charge->balance_transaction;
            $currency = $charge->currency;
            $amount= $charge->amount;
        $student->admission->update([
            //payment details
            'payment_type' => 'Stripe',
            'payment_method' => $pMethod,
            'balance_transaction' => $balanceTransaction,
            'currency' => $currency,
            'amount' => $amount,
            'payment_status' => true,

        ]);
        return back()->with('success', 'Payment is successfully complete!');
    }
}
