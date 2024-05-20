<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OnlineAdmissionRequest;
use App\Models\Setting;
use App\Models\Studentadmission;
use App\Repositories\OnlineAdmissionRepository;
use App\Repositories\StudentInfoRepository;
use App\Repositories\StudentRepository;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function store(OnlineAdmissionRequest $request)
    {
        $rowcount = Studentadmission::where('student_id', Auth('student')->user()->id)->first();
        if ($rowcount) {
            return redirect()->back()->with('info', 'You are already admitted here.');
        } else {

            $setting = Setting::latest()->first();
            // $total_amount = $setting->admission_fee;

            // Set your secret key. Remember to switch to your live secret key in production.
            // See your keys here: https://dashboard.stripe.com/apikeys
            \Stripe\Stripe::setApiKey('sk_test_51KUbT6LEylh30WQ8Mlb1wvxGBMq8Sm8YGm70jQGt7mbxv0zdYrG3wMsT2SrjuJYt3g93MPGQj0DJwnFVBHN3rOdw00wlXBiHEP');

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];

            $charge = \Stripe\Charge::create([
                'amount' => 10 * 100,
                'currency' => 'usd',
                'description' => 'Payment to Rahima Aziz',
                'source' => $token,
                'metadata' => ['order_id' => uniqid()],
            ]);
            $pMethod = $charge->payment_method;
            $balanceTransaction = $charge->balance_transaction;
            $currency = $charge->currency;
            $amount= $charge->amount;
            StudentRepository::onlineAdmissionUpdate($request);
            OnlineAdmissionRepository::storeByRequest($request, $request->student_id, $pMethod,$balanceTransaction,$currency,$amount);
            StudentInfoRepository::onlineAdmissionDetails($request, $request->student_id);

            //   $data = array(
            //     'student_id' => $payment->student_id,
            //     'name' => Auth('student')->user()->name,
            //     'email' => Auth('student')->user()->email,
            //     'address' => Auth('student')->user()->h_address,
            //     'payment_method' => $payment->payment_method,
            //     'admission_date' => \Carbon\Carbon::parse($payment->created_at)->format('d M Y'),
            //     'date' => $payment->admission_date,
            //     'total_amount' => $payment->amount,
            //     'transaction_id' => $payment->balance_transaction,

            // );

            // $pdf = pdf::loadView('frontend.email.payment-invoice', $data)->setOptions(['defaultFont' => 'sans-serif',]);
            //   $pdfname = 'rahimaaziz_' . uniqid() . '.pdf';

            //   Mail::to($data['email'])->send(new StudentMail($data));
            return redirect()->back()->with('success', 'Admission is completed Successfully.');
        }
    }
}
