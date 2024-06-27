<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeesRequest;
use App\Models\Educlass;
use App\Models\Fees;
use App\Models\FeesDetails;
use App\Models\Setting;
use App\Models\Studentadmission;
use App\Repositories\FeesRepository;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Carbon;

class FeesController extends Controller
{
    //index
    public function index(){
        $data['fees'] = FeesRepository::getAll();
        return view('backend.dashboard.fees.fees',$data);
    }
    public function create()
    {
        $groups = GroupRepository::query()->where('status', true)->get();

        return view('backend.dashboard.fees.create',compact('groups'));
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
    public function store(FeesRequest $request)
    {
       $fees = FeesRepository::storeByRequest($request);

        $month = $request->month;

        if (!empty($month)) {
            foreach ($month as $valu) {
                $mon = new FeesDetails();
                $mon->fees_id = $fees->id;
                $mon->admission_id = $request->student_id;
                $mon->month  = $valu;
                $mon->save();
            }
        }
        return redirect()->back()->with('success', 'Fee payment completed!.');
    }

    public function show(Fees $fees){
        $month = FeesDetails::where('fees_id',$fees->id)->get();
        return view('backend.dashboard.fees.details',compact('fees','month'));
    }
    public function partialEdit(Fees $fees){
        return view('backend.dashboard.fees.partial',compact('fees'));
    }
    public function partialUpdate(Request $request, Fees $fees){
        $this->validate($request, [
            'fees_amount' => 'required'
        ]);
        $balance = $fees->blance - $request->fees_amount;
        $currentAmount = $fees->amount + $request->fees_amount;


        if($fees->amount == $currentAmount){
            $status = 1;
        }else{
            $status = 2;
        }
        $fees->update([
            'blance' => $balance,
            'amount' => $currentAmount,
            'status' => $status
        ]);
        return redirect()->route('admin.fees.index')->with('success', 'partials fees payment successfully!');
    }
}
