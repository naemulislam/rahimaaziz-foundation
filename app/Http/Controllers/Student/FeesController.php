<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Fees;
use App\Models\FeesDetails;
use App\Models\Setting;
use App\Models\Studentadmission;
use Illuminate\Http\Request;
use PDF;

class FeesController extends Controller
{
    //
    public function index()
    {
        $getId = Studentadmission::where('student_id', Auth('student')->user()->id)->first();
        $data = Fees::where('admission_id', $getId->id)->get();
        return view('backend.dashboard.student.fees.fees', compact('data'));
    }
    public function create()
    {

         return view('backend.dashboard.student.fees.create');
    }
    public function feesPaymentInvoice($id)
    {
        $data['fees'] = Fees::find($id);
        $get_id = $data['fees']->id;
        $data['feesdetails'] = FeesDetails::where('fees_id',$get_id)->get();

        // $pdf = PDF::loadView('backend.dashboard.student.fees.invoice', $data);
    
        // return $pdf->download('fees_invoice.pdf');
        return view('backend.dashboard.student.fees.invoice',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'due_date' => 'required',
            'fees_dollar' => 'required',
            'pay_type' => 'required|in:1,2'
        ]);
        //this condition is discount type
        
            $setting = Setting::latest()->first();
            $fees_amount = $setting->monthly_fees;

            $monthCount = count($request->month);
            $total_amount = $fees_amount * $monthCount;
            $blans = $total_amount - $request->fees_dollar;
        

       if($request->pay_type == 1){
         // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51KUbT6LEylh30WQ8Mlb1wvxGBMq8Sm8YGm70jQGt7mbxv0zdYrG3wMsT2SrjuJYt3g93MPGQj0DJwnFVBHN3rOdw00wlXBiHEP');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $request->fees_dollar * 100,
            'currency' => 'usd',
            'description' => 'Payment to Rahima Aziz',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
       }

        elseif($request->pay_type == 2){
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

  

    $customer = Stripe\Customer::create(array(

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

  

    Stripe\Charge::create ([

            "amount" => $request->fees_dollar * 100,

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
        $getId = Studentadmission::where('student_id', Auth('student')->user()->id)->first();
        $data = new Fees();
        $data->admission_id          = $getId->id;
        $data->class_id              = $getId->class_id;
        $data->amount                = $total_amount;
        $data->pay                   = $request->fees_dollar;
        $data->due_date              = $request->due_date;
        
            if($request->fees_dollar == $total_amount){
                $data->status                = 1;
            }else{
                $data->status                = 2;
            }

        
        $data->payment_id            = $charge->id;
        $data->payment_type          = "Stripe";
        $data->payment_method        = $charge->payment_method;
        $data->balance_transaction   = $charge->balance_transaction;
        $data->currency              = $charge->currency;
        
        if (!empty($blans)) {

            $data->blance                = $blans;
        } else {
            $data->blance                = 0.00;
        }
        $data->discount                = 0.00;
        $data->pay_type              = $request->pay_type;
        // return $data;
        $data->save();
        $month = $request->month;
        if (!empty($month)) {
            foreach ($month as $valu) {
                $mon = new FeesDetails();
                $mon->fees_id = $data->id;
                $mon->admission_id = $getId->id;
                $mon->month  = $valu;
                // return $mon;
                $mon->save();
            }
        }


        $notification = array(
            'message' => 'Fee payment completed!.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function show($id){
        $data = Fees::find($id);
        $month = FeesDetails::where('fees_id',$data->id)->get();
        return view('backend.dashboard.student.fees.details',compact('data','month'));
    }
    public function partialEdit($id){
        $data = Fees::find($id);
        return view('backend.dashboard.student.fees.partial',compact('data'));
    }
    public function partialUpdate(Request $request, $id){
        $this->validate($request, [
            'fees_dollar' => 'required'
        ]);

        \Stripe\Stripe::setApiKey('sk_test_51KUbT6LEylh30WQ8Mlb1wvxGBMq8Sm8YGm70jQGt7mbxv0zdYrG3wMsT2SrjuJYt3g93MPGQj0DJwnFVBHN3rOdw00wlXBiHEP');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $request->fees_dollar * 100,
            'currency' => 'usd',
            'description' => 'Payment to Rahima Aziz',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        
        $data = Fees::find($id);
        $blnc = $data->blance - $request->fees_dollar;
        $pay = $data->pay + $request->fees_dollar;

        $data->blance  = $blnc;
        $data->pay  = $pay;

        if($data->amount == $pay){
            $data->status = 1;
        }else{
            $data->status = 2;
        }
        $data->save();
        $notification = array(
            'message' => 'Fee payment completed!.',
            'alert-type' => 'success'
        );
        return redirect()->route('student.fees.index')->with($notification);
    }
}
