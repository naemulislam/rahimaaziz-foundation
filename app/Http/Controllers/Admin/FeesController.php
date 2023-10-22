<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Educlass;
use App\Models\Fees;
use App\Models\FeesDetails;
use App\Models\Setting;
use App\Models\Studentadmission;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Carbon;

class FeesController extends Controller
{
    //index
    public function index(){
        $data['fees'] = Fees::latest()->get();
        return view('backend.dashboard.admin.fees.fees',$data);
    }
    public function create()
    {
        $class = Educlass::all();

        return view('backend.dashboard.admin.fees.create',compact('class'));
    }
    public function feesPaymentInvoice($id)
    {
        $data['fees'] = Fees::find($id);
        $get_id = $data['fees'] ->id;
        $data['feesdetails'] = FeesDetails::where('fees_id',$get_id)->get();
        
       
        // $data = [
        //     'name' => $get_student->student->name,
        //     'email' => $get_student->student->email,
        //     'address' => $get_student->studentinfo->address,
        //     'phone' => $get_student->admi_phone,
        //     'due_date' => Carbon::parse($fees->due_date)->format('M/d/Y'),
        //     'amount_due'=>$fees->blance,
        //     'amount_pay'=>$fees->pay,
        //     'invoice'=> random_int(100, 999),
        // ];
        
      

        // $pdf = PDF::loadView('backend.dashboard.admin.fees.invoice', $data);
    
        // return $pdf->download('test_invoice.pdf');
        return view('backend.dashboard.admin.fees.invoice',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'due_date' => 'required',
            'fees_dollar' => 'required'
        ]);
        //this condition is discount type
      
            $setting = Setting::latest()->first();
            $fees_amount = $setting->monthly_fees;

            $monthCount = count($request->month);
            $total_amount = $fees_amount * $monthCount;
            $blans = $total_amount - $request->fees_dollar;
        

        $data = new Fees();
        $data->admission_id          = $request->student_id;
        $data->class_id              = $request->class_id;
        $data->amount                = $total_amount;
        if($request->discount){
            $data->pay                = $request->discount_amount;
        }else{
        $data->pay                   = $request->fees_dollar;
       }
        $data->due_date              = $request->due_date;
        if($request->fees_dollar == $total_amount){
            $data->status                = 1;
        }else{
            $data->status                = 2;
        }
       
        $data->payment_type          = "Hand Cash";
        
        if (!empty($blans)) {

            $data->blance                = $blans;
        } else {
            $data->blance                = 0.00;
        }
        if($request->discount){
           if($request->discount_type == 1){
            $data->discount                = $request->discount.'$';
           }
           elseif($request->discount_type == 2){
            $data->discount                = $request->discount.'%';
           }
        }else{
            $data->discount                = 0.00;
        }
        $data->pay_type              = $request->pay_type;
        // return $data;
        $data->save();
        $month = $request->month;
        if (!empty($month)) {
            foreach ($month as $valu) {
                $mon = new FeesDetails();
                $mon->fees_id = $data->id;
                $mon->admission_id = $request->student_id;
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
        return view('backend.dashboard.admin.fees.details',compact('data','month'));
    }
    public function partialEdit($id){
        $data = Fees::find($id);
        return view('backend.dashboard.admin.fees.partial',compact('data'));
    }
    public function partialUpdate(Request $request, $id){
        $this->validate($request, [
            'fees_dollar' => 'required'
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
        return redirect()->route('admin.fees.index')->with($notification);
    }
}
