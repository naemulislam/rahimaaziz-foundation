<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionRequest;
use App\Models\Student;
use App\Repositories\AdmissionRepository;
use App\Repositories\GroupRepository;
use App\Repositories\StudentInfoRepository;
use App\Repositories\StudentLogRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $group = request()->group_id;
        if ($group) {
            $admissionStudent = StudentRepository::query()
                ->whereHas('admission', function ($query) use ($group) {
                    $query->where('group_id', $group);
                })
                ->where('status', true)
                ->where('admission_status', true)
                ->where('status_type', 1)->get();
        } else {
            $admissionStudent = StudentRepository::query()
                ->where('status', true)
                ->where('admission_status', true)
                ->where('status_type', 1)->get();
        }

        $groups = GroupRepository::query()->where('status', true)->get();
        return view('backend.dashboard.admission.student_list', compact('admissionStudent', 'groups'));
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
        StudentInfoRepository::storeByRequest($request, $studentId->id);

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
        if ($student->admission_status == 0) {
            $student->update([
                'admission_status' => true,
                'status_type' => true,
            ]);
            $student->admission->update([
                'study_status' => true,
            ]);
        }
        StudentRepository::updateByRequest($request, $student);
        AdmissionRepository::updateByRequest($request, $student->id);
        StudentInfoRepository::updateByRequest($request, $student->id);

        return back()->with('success', 'Student is updated successfully!');
    }

    public function destroy(Student $student)
    {
        $studentAdmission = AdmissionRepository::query()->where('student_id', $student->id)->first();
        if ($studentAdmission->b_certificate) {
            @unlink(public_path($studentAdmission->b_certificate));
        }
        if ($studentAdmission->immu_record) {
            @unlink(public_path($studentAdmission->immu_record));
        }
        if ($studentAdmission->proof_address) {
            @unlink(public_path($studentAdmission->proof_address));
        }
        if ($studentAdmission->physical_health) {
            @unlink(public_path($studentAdmission->physical_health));
        }
        if ($studentAdmission->mrrcfps) {
            @unlink(public_path($studentAdmission->mrrcfps));
        }
        if ($studentAdmission->hsral) {
            @unlink(public_path($studentAdmission->hsral));
        }
        $studentAdmission->delete();
        $studentInfo = StudentInfoRepository::query()->where('student_id', $student->id)->first();
        $studentInfo->delete();
        if ($student->image) {
            @unlink(public_path($student->image));
        }
        $student->delete();
        return back()->with('success', 'Student is deleted successfully!');
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
    public function pendingindex()
    {
        $data = StudentRepository::query()
            ->where('status', true)
            ->where('admission_status', false)
            ->where('status_type', 0)->get();
        return view('backend.dashboard.admission.online_admission_request_list', compact('data'));
    }
    // public function admissionApproved(Student $student)
    // {
    //     $student->update([
    //         'admission_status' => true
    //     ]);
    //     $data = Student::where('slug', $slug)->first();
    //     return view('backend.dashboard.admission.request-dtls', compact('data'));
    // }

    public function admissionPaymentStatus(Request $request, Student $student)
    {
        // dd($request->all());
        $admissionStudent = AdmissionRepository::query()->where('student_id', $student->id)->first();
        $status = false;
        if ($request->payment_status == 1) {
            $status = true;
        }
        $admissionStudent->update([
            'payment_status' => $status
        ]);
        return back()->with('success', 'Status changed successfully!');
    }
    //Student promotion methods
    public function promotionIndex()
    {
        $group = request()->group_id;
        $students = StudentRepository::query()
            ->whereHas('admission', function ($query) use ($group) {
                $query->where('group_id', $group);
            })
            ->where('status', true)
            ->where('admission_status', true)
            ->where('status_type', 1)->get();
        $groups = GroupRepository::query()->where('status', true)->get();
        return view('backend.dashboard.promote_student.student_list', compact('students', 'groups'));
    }
    public function promoteStore(Request $request)
    {
        if ($request->row_id == null) {
            return back()->with('error', 'Plese select students!');
        } else {
            foreach ($request->row_id as $key => $value) {
                // $request->validate([
                //     'n_roll.*' => 'required'
                // ]);
                $student = StudentRepository::find($value);
                $admissionTable = AdmissionRepository::query()->where('student_id', $student->id)->first();
                $checkStudentLogs = StudentLogRepository::query()->where('group_id', $request->group_id[$key])->first();
                if ($checkStudentLogs) {
                    $checkStudentLogs->delete();
                } else {
                    StudentLogRepository::storeByRequest($student, $admissionTable);
                }
                $admissionTable->update([
                    'roll' => $request->n_roll[$key],
                    'group_id' => $request->group_id[$key]
                ]);
            }
            return back()->with('success', 'Students promotion successfully!');
        }
    }
}
