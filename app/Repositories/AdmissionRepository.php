<?php

namespace App\Repositories;

use App\Http\Requests\AdmissionRequest;
use App\Models\Studentadmission;
use Illuminate\Http\Request;

class AdmissionRepository extends Repository
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

    public static function storeByRequest(AdmissionRequest $request, $studentId)
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
            'admission_no' => $request->admission_no,
            'admission_date' => $request->admission_date,
            'roll' => $request->roll,
            'registration_no' => $request->registration_no,
            'group_id' => $request->group_id,
            'class_grade' => $request->class_grade,

            //Student Documents
            'b_certificate' => $birthCertificat,
            'immu_record' => $immuRecord,
            'proof_address' => $proofAddress,
            'physical_health' => $physicalHealth,
            'mrrcfps' => $mrrcfps,
            'hsral' => $hsral,
            //payment details
            'payment_type' => 'Hand Cash',
            'payment_status' => 1,
            'status' => true
        ]);
        return $admissionCreate;
    }
    public static function updateByRequest(AdmissionRequest $request, $studentId)
    {
        $studentAdmission = self::query()->where('student_id',$studentId)->first();
        // Birth Cirtificate
        $file = $request->file('b_certificate');
        $birthCertificat = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'b_certificate' . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $studentAdmission->b_certificate;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $birthCertificat = '/uploaded/student/documents/' . $fileName;
        }
        //Immunization record*
        $file = $request->file('immu_record');
        $immuRecord = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'immu_record' . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $studentAdmission->immu_record;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $immuRecord = '/uploaded/student/documents/' . $fileName;
        }
        //Proof of address*
        $file = $request->file('proof_address');
        $proofAddress = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'proof_address' . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $studentAdmission->proof_address;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $proofAddress = '/uploaded/student/documents/' . $fileName;
        }
        //physical health report from the
        $file = $request->file('physical_health');
        $physicalHealth = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'physical_health' . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $studentAdmission->physical_health;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $physicalHealth = '/uploaded/student/documents/' . $fileName;
        }
        //most recent report card from previous school*
        $file = $request->file('mrrcfps');
        $mrrcfps = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'mrrcfps' . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $studentAdmission->mrrcfps;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $mrrcfps = '/uploaded/student/documents/' . $fileName;
        }
        //Homeschooling registration acceptance letter*
        $file = $request->file('hsral');
        $hsral = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'hsral' . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $studentAdmission->hsral;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $hsral = '/uploaded/student/documents/' . $fileName;
        }
        $admissionUpdate = self::update($studentAdmission,[
            'admission_no' => $request->admission_no,
            'admission_date' => $request->admission_date,
            'roll' => $request->roll,
            'registration_no' => $request->registration_no,
            'group_id' => $request->group_id,
            'class_grade' => $request->class_grade,

            //Student Documents
            'b_certificate' => $birthCertificat ?? $studentAdmission->b_certificate,
            'immu_record' => $immuRecord ?? $studentAdmission->immu_record,
            'proof_address' => $proofAddress ?? $studentAdmission->proof_address,
            'physical_health' => $physicalHealth ?? $studentAdmission->physical_health,
            'mrrcfps' => $mrrcfps ?? $studentAdmission->mrrcfps,
            'hsral' => $hsral ?? $studentAdmission->hsral,
        ]);
        return $admissionUpdate;
    }
    public static function studentPortalDocumentUpdate(Request $request, $studentId)
    {
        $studentAdmission = self::query()->where('student_id',$studentId)->first();
        // Birth Cirtificate
        $file = $request->file('b_certificate');
        $birthCertificat = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'b_certificate' . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $studentAdmission->b_certificate;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $birthCertificat = '/uploaded/student/documents/' . $fileName;
        }
        //Immunization record*
        $file = $request->file('immu_record');
        $immuRecord = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'immu_record' . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $studentAdmission->immu_record;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $immuRecord = '/uploaded/student/documents/' . $fileName;
        }
        //Proof of address*
        $file = $request->file('proof_address');
        $proofAddress = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'proof_address' . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $studentAdmission->proof_address;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $proofAddress = '/uploaded/student/documents/' . $fileName;
        }
        //physical health report from the
        $file = $request->file('physical_health');
        $physicalHealth = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'physical_health' . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $studentAdmission->physical_health;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $physicalHealth = '/uploaded/student/documents/' . $fileName;
        }
        //most recent report card from previous school*
        $file = $request->file('mrrcfps');
        $mrrcfps = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'mrrcfps' . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $studentAdmission->mrrcfps;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $mrrcfps = '/uploaded/student/documents/' . $fileName;
        }
        //Homeschooling registration acceptance letter*
        $file = $request->file('hsral');
        $hsral = null;
        if ($file) {
            $extenstion = $file->getClientOriginalExtension();
            $fileName = 'hsral' . '_' . uniqid() . '.' . $extenstion;
            $unlinkImage = $studentAdmission->hsral;
            @unlink(public_path($unlinkImage));
            $file->move(public_path('uploaded/student/documents'), $fileName);
            $hsral = '/uploaded/student/documents/' . $fileName;
        }
        $portalDocumentUpdate = self::update($studentAdmission,[
            //Student Documents
            'b_certificate' => $birthCertificat ?? $studentAdmission->b_certificate,
            'immu_record' => $immuRecord ?? $studentAdmission->immu_record,
            'proof_address' => $proofAddress ?? $studentAdmission->proof_address,
            'physical_health' => $physicalHealth ?? $studentAdmission->physical_health,
            'mrrcfps' => $mrrcfps ?? $studentAdmission->mrrcfps,
            'hsral' => $hsral ?? $studentAdmission->hsral,
        ]);
        return $portalDocumentUpdate;
    }
}
