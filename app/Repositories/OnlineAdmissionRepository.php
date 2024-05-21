<?php

namespace App\Repositories;

use App\Http\Requests\OnlineAdmissionRequest;
use App\Models\Studentadmission;
use Illuminate\Http\Request;

class OnlineAdmissionRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return Studentadmission::class;
    }

    public static function storeByRequest(OnlineAdmissionRequest $request, $studentId)
    {
        $generate_id  = random_int(10000000, 99999999);

        // Birth Cirtificate
        $file = $request->file('b_certificate');
        $birthCertificat = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'b_certificate' . '_' . uniqid() . '.' . $extenstion;
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $birthCertificat = '/uploaded/student/documents/' . $fileName;
        }
        //Immunization record*
        $file = $request->file('immu_record');
        $immuRecord = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'immu_record' . '_' . uniqid() . '.' . $extenstion;
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $immuRecord = '/uploaded/student/documents/' . $fileName;
        }
        //Proof of address*
        $file = $request->file('proof_address');
        $proofAddress = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'proof_address' . '_' . uniqid() . '.' . $extenstion;
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $proofAddress = '/uploaded/student/documents/' . $fileName;
        }
        //physical health report from the
        $file = $request->file('physical_health');
        $physicalHealth = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'physical_health' . '_' . uniqid() . '.' . $extenstion;
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $physicalHealth = '/uploaded/student/documents/' . $fileName;
        }
        //most recent report card from previous school*
        $file = $request->file('mrrcfps');
        $mrrcfps = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'mrrcfps' . '_' . uniqid() . '.' . $extenstion;
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $mrrcfps = '/uploaded/student/documents/' . $fileName;
        }
        //Homeschooling registration acceptance letter*
        $file = $request->file('hsral');
        $hsral = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'hsral' . '_' . uniqid() . '.' . $extenstion;
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $hsral = '/uploaded/student/documents/' . $fileName;
        }
        $admissionCreate = self::create([
            'student_id' => $studentId,
            'id_number' => $generate_id,
            'admission_date' => $request->admission_date,
            'group_id' => $request->group_id,

            //Student Documents
            'b_certificate' => $birthCertificat,
            'immu_record' => $immuRecord,
            'proof_address' => $proofAddress,
            'physical_health' => $physicalHealth,
            'mrrcfps' => $mrrcfps,
            'hsral' => $hsral,
            //payment details
            // 'payment_type' => 'Stripe',
            // 'payment_method' => $pMethod,
            // 'balance_transaction' => $balanceTransaction,
            // 'currency' => $currency,
            // 'amount' => $amount,
            'payment_status' => 0,
            'status' => true
        ]);
        return $admissionCreate;
    }
}
