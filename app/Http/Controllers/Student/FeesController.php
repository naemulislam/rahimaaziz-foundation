<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Fees;
use App\Models\FeesDetails;
use App\Models\Setting;
use App\Models\Studentadmission;
use App\Repositories\FeesRepository;
use App\Repositories\SettingRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class FeesController extends Controller
{
    //
    public function index()
    {
        $getId = Studentadmission::where('student_id', Auth('student')->user()->id)->first();
        $fees = Fees::where('admission_id', $getId->id)->get();
        return view('backend.student.dashboard.fees.fees', compact('fees'));
    }
    public function create()
    {
        return view('backend.student.dashboard.fees.create');
    }
    public function feesPaymentInvoice(Fees $fees)
    {
        $data['feesdetails'] = FeesDetails::where('fees_id', $fees->id)->get();
        $settingdata = SettingRepository::query()->latest()->first();

        $data['data'] = [
            'name' => $fees->admission->student->name,
            'email' => $fees->admission->student->email,
            'address' => $fees->admission->student->studentinfo->address,
            'phone' => $fees->admission->student->phone,
            'pay_date' => Carbon::parse($fees->pay_date)->format('M/d/Y'),
            'amount_due'=>$fees->blance,
            'amount'=>$fees->amount,
            'discount'=>$fees->discount,
            'siteName'=>$settingdata->site_name,
            'logo'=>$settingdata->white_logo,
            'monthlyFees'=>$fees->group->monthly_fee,
            'invoice'=> random_int(100, 999),
        ];
        return view('backend.student.dashboard.fees.invoice', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'pay_date' => 'required|date',
            'fees_amount' => 'required',
            'pay_type' => 'required|in:1,2,3'
        ]);
        //this condition is discount type

        if ($request->pay_type == 1) {
            // Set your secret key. Remember to switch to your live secret key in production.
            // See your keys here: https://dashboard.stripe.com/apikeys
            \Stripe\Stripe::setApiKey('sk_test_51KUbT6LEylh30WQ8Mlb1wvxGBMq8Sm8YGm70jQGt7mbxv0zdYrG3wMsT2SrjuJYt3g93MPGQj0DJwnFVBHN3rOdw00wlXBiHEP');
            $token = $_POST['stripeToken'];

            $charge = \Stripe\Charge::create([
                'amount' => $request->fees_amount * 100,
                'currency' => 'usd',
                'description' => 'Payment to Rahima Aziz',
                'source' => $token,
                'metadata' => ['order_id' => uniqid()],
            ]);
        } elseif ($request->pay_type == 2) {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = \Stripe\Customer::create(array(

                "address" => [

                    "line1" => "Virani Chowk",

                    "postal_code" => "360001",

                    "city" => "Rajkot",

                    "state" => "GJ",

                    "country" => "IN",

                ],

                "email" => "demo@gmail.com",

                "name" => "Hardik Savani",

                "source" => $request->stripeToken

            ));



            $charge = \Stripe\Charge::create([

                "amount" => $request->fees_amount * 100,

                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Test payment from itsolutionstuff.com.",
                "shipping" => [
                    "name" => "Jenny Rosen",

                    "address" => [

                        "line1" => "510 Townsend St",

                        "postal_code" => "98140",

                        "city" => "San Francisco",

                        "state" => "CA",

                        "country" => "US",

                    ],

                ]

            ]);
        }
        $student = Studentadmission::where('student_id', Auth('student')->user()->id)->first();

        $pMethod = $charge->payment_method;
        $balanceTransaction = $charge->balance_transaction;
        $currency = $charge->currency;
        $fees = FeesRepository::studentDashboardFees($request, $student, $pMethod, $balanceTransaction, $currency);

        $month = $request->month;
        if (!empty($month)) {
            foreach ($month as $valu) {
                $mon = new FeesDetails();
                $mon->fees_id = $fees->id;
                $mon->admission_id = $student->id;
                $mon->month  = $valu;
                $mon->save();
            }
        }
        return back()->with('success', 'Payment is successfully complete!');
    }

    public function show(Fees $fees)
    {
        $month = FeesDetails::where('fees_id', $fees->id)->get();
        return view('backend.student.dashboard.fees.details', compact('fees', 'month'));
    }
    public function partialEdit(Fees $fees)
    {
        return view('backend.student.dashboard.fees.partial', compact('fees'));
    }
    public function partialUpdate(Request $request, Fees $fees)
    {
        $this->validate($request, [
            'fees_amount' => 'required|string'
        ]);

        \Stripe\Stripe::setApiKey('sk_test_51KUbT6LEylh30WQ8Mlb1wvxGBMq8Sm8YGm70jQGt7mbxv0zdYrG3wMsT2SrjuJYt3g93MPGQj0DJwnFVBHN3rOdw00wlXBiHEP');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $request->fees_amount * 100,
            'currency' => 'usd',
            'description' => 'Payment to Rahima Aziz',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        $balance = $fees->blance - $request->fees_amount;
        $currentAmount = $fees->amount + $request->fees_amount;

        if ($fees->amount == $currentAmount) {
            $status = 1;
        } else {
            $status = 2;
        }
        $fees->update([
            'blance' => $balance,
            'amount' => $currentAmount,
            'status' => $status
        ]);
        return redirect()->route('student.fees.index')->with('success', 'Partials fees payment successfully!');
    }
}
