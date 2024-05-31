<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentProfileRequest;
use App\Models\Student;
use App\Repositories\AdmissionRepository;
use App\Repositories\GroupRepository;
use App\Repositories\StudentInfoRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function profile()
    {
        return view('backend.student.dashboard.profile.profile');
    }

    public function update(StudentProfileRequest $request, Student $student)
    {
        StudentRepository::studentPortalProfileUpdate($request, $student);
        StudentInfoRepository::studentPortalProfileUpdate($request, $student->id);
        return back()->with('success', 'Profile is updated successfully!');
    }
    public function updateDocument(Request $request, Student $student)
    {
        $request->validate([
            'b_certificate' => 'nullable|mimes:jpg,jpeg,pdf|max:5120',
            'immu_record' => 'nullable|mimes:jpg,jpeg,pdf|max:5120',
            'proof_address' => 'nullable|mimes:jpg,jpeg,pdf|max:5120',
            'physical_health' => 'nullable|mimes:jpg,jpeg,pdf|max:5120',
            'mrrcfps' => 'nullable|mimes:jpg,jpeg,pdf|max:5120',
            'hsral' => 'nullable|mimes:jpg,jpeg,pdf|max:5120',
        ]);
        AdmissionRepository::studentPortalDocumentUpdate($request, $student->id);
        return back()->with('success', 'Document is updated successfully!');
    }
    //student portal change password method

    public function cPassword()
    {
        return view('backend.student.dashboard.profile.edit-password');
    }

    public function updatePassword(Request $request, Student $student)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);
        $currentPassword = $request->current_password;
        $isPassword = Hash::check($currentPassword, $student->password);
        if ($isPassword) {
            $student->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect()->route('student.dashboard')->with('success', 'Password is updated successfully!');
        } else {

            return redirect()->back()->with('error', 'Sorry! Your current password dost not match.');
        }
    }
    //Admission fee payment method
    public function admissionFeeStore(Request $request, Student $student)
    {
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
        $amount = $charge->amount;
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
