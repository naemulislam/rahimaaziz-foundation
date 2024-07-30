<?php

namespace App\Repositories;

use App\Http\Requests\FeesRequest;
use App\Models\Fees;
use Illuminate\Http\Request;

class FeesRepository extends Repository
{
    public static function model()
    {
        return Fees::class;
    }

    public static function storeByRequest(FeesRequest $request)
    {
        $group = GroupRepository::query()->where('id', $request->group_id)->first();
        $monthlyFees = $group->monthly_fee;
        $countRequestMonth = count($request->month);
        $total_amount = $monthlyFees * $countRequestMonth;
        $blance = $total_amount - $request->fees_amount;
        $mainAmount = $request->fees_amount;

        if ($request->discount) {
            $mainAmount = $request->discount_amount;

            if ($request->discount_type == 1) {

                $discount = $request->discount . '$';
            } elseif ($request->discount_type == 2) {

                $discount = $request->discount . '%';
            }
        } else {
            $discount = 0.00;
        }
        if ($request->fees_amount == $total_amount) {
            $status = 1;
        } else {
            $status = 2;
        }

        $feesPaymentCreate = self::create([
            'admission_id' => $request->student_id,
            'group_id' => $request->group_id,
            'amount' => $mainAmount,
            'blance' => $blance,
            'discount' => $discount,
            'pay_date' => $request->pay_date,
            'payment_type' => "Hand Cash",
            'status' => $status,
            'pay_type' => $request->pay_type
        ]);
        return $feesPaymentCreate;
    }
    public static function studentDashboardFees(Request $request, $student, $pMethod, $balanceTransaction, $currency)
    {
        $monthlyFees = $student->group->monthly_fee;
        $countRequestMonth = count($request->month);
        $total_amount = $monthlyFees * $countRequestMonth;
        $blance = $total_amount - $request->fees_amount;
        $mainAmount = $request->fees_amount;

        $discount = 0.00;

        if ($request->fees_amount == $total_amount) {
            $status = 1;
        } else {
            $status = 2;
        }
        if($request->pay_type == 1){
            $paymentType = 'Credit Card';
        }elseif($request->pay_type == 2){
            $paymentType = 'Debit Card';
        }else{
            $paymentType = 'Others';
        }

        $feesPaymentCreate = self::create([
            'admission_id' => $student->id,
            'group_id' => $student->group_id,
            'amount' => $mainAmount,
            'blance' => $blance,
            'discount' => $discount,
            'pay_date' => $request->pay_date,
            'payment_type' => 'Stripe',
            'payment_method' => $pMethod,
            'balance_transaction' => $balanceTransaction,
            'currency' => $currency,
            'status' => $status,
            'pay_type' =>  $paymentType,
        ]);
        return $feesPaymentCreate;
    }
}
