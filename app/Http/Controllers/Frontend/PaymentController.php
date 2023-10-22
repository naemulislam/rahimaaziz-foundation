<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\StudentMail;
use App\Models\Setting;
use App\Models\Studentadmission;
use App\Models\StudentInfo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
  public function store(Request $request)
  {

    $this->validate($request, [
      'class_id' => 'required',
      'admi_name' => 'required',
      'admission_date' => 'required',
      'date_of_birth' => 'required',
      'place_of_birth' => 'required',
      'admi_photo' => 'required',
      'b_cirti' => 'required',
      'h_address' => 'required',
      'city' => 'required',
      'state' => 'required',
      'zip_code' => 'required',
      'father_name' => 'required',
      'father_call' => 'required',
      'mother_name' => 'required',
      'mother_call' => 'required'
    ]);

    $rowcount = Studentadmission::where('student_id', Auth('student')->user()->id)->count();
    if ($rowcount == 0) {

      $setting = Setting::latest()->first();
      $total_amount = $setting->admission_fee;

      // Set your secret key. Remember to switch to your live secret key in production.
      // See your keys here: https://dashboard.stripe.com/apikeys
      \Stripe\Stripe::setApiKey('sk_test_51KUbT6LEylh30WQ8Mlb1wvxGBMq8Sm8YGm70jQGt7mbxv0zdYrG3wMsT2SrjuJYt3g93MPGQj0DJwnFVBHN3rOdw00wlXBiHEP');

      // Token is created using Checkout or Elements!
      // Get the payment token ID submitted by the form:
      $token = $_POST['stripeToken'];

      $charge = \Stripe\Charge::create([
        'amount' => $total_amount * 100,
        'currency' => 'usd',
        'description' => 'Payment to Rahima Aziz',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
      ]);
      $id_date  = date('ymd');
      $id_number = Studentadmission::latest()->first();
      if ($id_number) {
        $removed1char = substr($id_number->id_number, 6);
        $generate_id = $stpad = $id_date . str_pad($removed1char + 1, 2, "0", STR_PAD_LEFT);
      } else {
        $generate_id = $id_date . str_pad(1, 2, "0", STR_PAD_LEFT);
      }

      $payment = new Studentadmission();
      $payment->id_number             = $generate_id;

      $payment->student_id            = Auth('student')->user()->id;
      $payment->class_id              = $request->class_id;
      $payment->admi_name              = $request->admi_name;
      $payment->admission_date        = $request->admission_date;

      //$payment->admi_photo            = $request->admi_photo;
      $payment->admi_phone            = $request->admi_phone;

      $payment->payment_id            = $charge->id;
      $payment->payment_type          = "Stripe";
      $payment->payment_method        = $charge->payment_method;
      $payment->balance_transaction   = $charge->balance_transaction;
      $payment->currency              = $charge->currency;
      $payment->amount                = $charge->amount;
      $payment->payment_status        = 1;

      $image = $request->file('admi_photo');
      if ($image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploaded/student/admission'), $imageName);
        $payment->admi_photo = '/uploaded/student/admission/' . $imageName;
      }
      // Birth Cirtificate
      $image = $request->file('b_cirti');
      if ($image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploaded/student/admission'), $imageName);
        $payment->b_cirti = '/uploaded/student/admission/' . $imageName;
      }
      //Immunization record*
      $image = $request->file('immu_record');
      if ($image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploaded/student/admission'), $imageName);
        $payment->immu_record = '/uploaded/student/admission/' . $imageName;
      }
      //Proof of address*
      $image = $request->file('proof_address');
      if ($image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploaded/student/admission'), $imageName);
        $payment->proof_address = '/uploaded/student/admission/' . $imageName;
      }
      //Guardians picture
      $image = $request->file('guard_pic');
      if ($image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploaded/student/admission'), $imageName);
        $payment->guard_pic = '/uploaded/student/admission/' . $imageName;
      }
      //physical health report from the
      $image = $request->file('physical_health');
      if ($image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploaded/student/admission'), $imageName);
        $payment->physical_health = '/uploaded/student/admission/' . $imageName;
      }
      //most recent report card from previous school*
      $image = $request->file('mrrcfps');
      if ($image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploaded/student/admission'), $imageName);
        $payment->mrrcfps = '/uploaded/student/admission/' . $imageName;
      }
      //Homeschooling registration acceptance letter*
      $image = $request->file('hsral');
      if ($image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploaded/student/admission'), $imageName);
        $payment->hsral = '/uploaded/student/admission/' . $imageName;
      }

      $payment->save();



      //$studentcount = StudentInfo::wehre('id',Auth('student')->user()->id)->first();
      $rowcount = StudentInfo::where('student_id', Auth('student')->user()->id)->count();
      if ($rowcount == 0){
        $data = new StudentInfo();
        $data->student_id            = Auth('student')->user()->id;
        $data->date_of_birth         = $request->date_of_birth;
        $data->place_of_birth        = $request->place_of_birth;
        $data->address               = $request->address;
        $data->city                  = $request->city;
        $data->state                 = $request->state;
        $data->zip_code              = $request->zip_code;
        $data->father_name           = $request->father_name;
        $data->father_call           = $request->father_call;
        $data->mother_name           = $request->mother_name;
        $data->mother_call           = $request->mother_call;
        $data->save();
      } else {
        $data = StudentInfo::find(Auth('student')->user()->id);
        $data->date_of_birth         = $request->date_of_birth;
        $data->place_of_birth        = $request->place_of_birth;
        $data->address             = $request->address;
        $data->city                  = $request->city;
        $data->state                 = $request->state;
        $data->zip_code              = $request->zip_code;
        $data->father_name           = $request->father_name;
        $data->father_call           = $request->father_call;
        $data->mother_name           = $request->mother_name;
        $data->mother_call           = $request->mother_call;
        $data->save();
      }

      $data = array(
        'student_id' => $payment->student_id,
        'name' => Auth('student')->user()->name,
        'email' => Auth('student')->user()->email,
        'address' => Auth('student')->user()->h_address,
        'payment_method' => $payment->payment_method,
        'admission_date' => \Carbon\Carbon::parse($payment->created_at)->format('d M Y'),
        'date' => $payment->admission_date,
        'total_amount' => $payment->amount,
        'transaction_id' => $payment->balance_transaction,

    );

      // $pdf = pdf::loadView('frontend.email.payment-invoice', $data)->setOptions(['defaultFont' => 'sans-serif',]);
      //   $pdfname = 'rahimaaziz_' . uniqid() . '.pdf';

      Mail::to($data['email'])->send(new StudentMail($data));
      
      $notification = array(
        'message' => 'Admission Successfully.',
        'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);
    } 
    else {
      $notification = array(
        'message' => 'You are already admitted here.',
        'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);
    }
  }
}
