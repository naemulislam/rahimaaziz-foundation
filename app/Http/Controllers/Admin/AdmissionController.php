<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionRequest;
use App\Models\Student;
use App\Repositories\AdmissionRepository;
use App\Repositories\GroupRepository;
use App\Repositories\StudentInfoRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissionStudent = StudentRepository::query()
        ->where('status',true)
        ->where('admission_status',true)
        ->where('status_type',1)->get();
        return view('backend.dashboard.admission.student_list', compact('admissionStudent'));
    }

    public function create()
    {
        $data["class_group"] = GroupRepository::query()->where('status', true)->get();
        return view('backend.dashboard.admission.create', $data);
    }

    public function store(AdmissionRequest $request)
    {
        $studentId = StudentRepository::storeByRequest($request);
        AdmissionRepository::storeByRequest($request, $studentId->id);
        StudentInfoRepository::storeByRequest($request,$studentId->id);

            //   $get_id = Student::find( $request->student_id);
            //   $data = array(
            //     'name' => $get_id->name,
            //     'email' => $get_id->email

            // );

            //Mail::to($data['email'])->send(new StudentMail($data));
            return redirect()->back()->with('success', 'Admission successfully completed!');
    }
    public function show($slug)
    {
        $data['student'] = StudentRepository::query()->where('slug', $slug)->first();
        return view('backend.dashboard.admission.admission_dtls', $data);
    }

    public function edit($slug)
    {
        $data['student'] = StudentRepository::query()->where('slug', $slug)->first();
        $data['groups'] = GroupRepository::query()->where('status', true)->get();

        return view('backend.dashboard.admission.edit', $data);
    }

    public function update(AdmissionRequest $request, Student $student)
    {
        $studentId = StudentRepository::updateByRequest($request,$student);
        AdmissionRepository::updateByRequest($request, $student->id);
        StudentInfoRepository::updateByRequest($request,$student->id);

        return back()->with('success', 'Student is updated successfully!');
    }

    public function destroy(Student $student)
    {
        $studentAdmission = AdmissionRepository::query()->where('student_id',$student->id)->first();
        if($studentAdmission->b_certificate){
            @unlink(public_path($studentAdmission->b_certificate));
        }
        if($studentAdmission->immu_record){
            @unlink(public_path($studentAdmission->immu_record));
        }
        if($studentAdmission->proof_address){
            @unlink(public_path($studentAdmission->proof_address));
        }
        if($studentAdmission->physical_health){
            @unlink(public_path($studentAdmission->physical_health));
        }
        if($studentAdmission->mrrcfps){
            @unlink(public_path($studentAdmission->mrrcfps));
        }
        if($studentAdmission->hsral){
            @unlink(public_path($studentAdmission->hsral));
        }
        $studentAdmission->delete();
        $studentInfo = StudentInfoRepository::query()->where('student_id',$student->id)->first();
        $studentInfo->delete();
        if($student->image){
            @unlink(public_path($student->image));
        }
        $student->delete();
        return back()->with('success','Student is deleted successfully!');
    }
    public function status(Request $request, Student $student)
    {
        $status = false;
        if ($request->status == 1) {
            $status = true;
        }
        $student->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }
    //pending student method
    public function pandingindex()
    {
        $data = StudentRepository::query()
        ->where('status',true)
        ->where('admission_status',false)
        ->where('status_type',1)->get();
        return view('backend.dashboard.admission.request-list', compact('data'));
    }
    public function pendingindex($slug)
    {
        $data = Student::where('slug', $slug)->first();
        return view('backend.dashboard.admin.admission.request-dtls', compact('data'));
    }
}
