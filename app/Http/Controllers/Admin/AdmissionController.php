<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionRequest;
use App\Models\Educlass;
use App\Models\Group;
use App\Models\Student;
use App\Models\Studentadmission;
use App\Models\StudentInfo;
use App\Repositories\AdmissionRepository;
use App\Repositories\GroupRepository;
use App\Repositories\StudentInfoRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissionStudent = StudentRepository::query()->where('admission_status',true)->get();
        return view('backend.dashboard.admission.student_list', compact('admissionStudent'));
    }
    public function pandingindex()
    {
        $data = Studentadmission::where('status', 0)->get();
        return view('backend.dashboard.admin.admission.request-list', compact('data'));
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
    public function pandingshow($slug)
    {
        $data = Student::where('slug', $slug)->first();
        return view('backend.dashboard.admin.admission.request-dtls', compact('data'));
    }

    public function edit($slug)
    {
        $data['student'] = StudentRepository::query()->where('slug', $slug)->first();
        $data['groups'] = GroupRepository::query()->where('status', true)->get();

        return view('backend.dashboard.admission.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'admission_no' => 'required',
            'class_id' => 'required',
            'roll' => 'required',
            'registration_no' => 'required',
            'admission_date' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'h_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ]);

        $data = Studentadmission::find($id);
        $data->id_number             = $request->id_number;
        $data->admission_no         = $request->admission_no;
        $data->admission_date       = $request->admission_date;
        $data->roll                 = $request->roll;
        $data->registration_no      = $request->registration_no;
        $data->admi_name            = $request->admi_name;
        $data->class_id            = $request->class_id;
        $data->admi_phone            = $request->admi_phone;
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->admi_photo;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student/admission'), $imageName);
            $data->admi_photo = '/uploaded/student/admission/' . $imageName;
        }
        // Birth Cirtificate
        $image = $request->file('b_cirti');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->b_cirti;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student/admission'), $imageName);
            $data->b_cirti = '/uploaded/student/admission/' . $imageName;
        }
        //Immunization record*
        $image = $request->file('immu_record');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->immu_record;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student/admission'), $imageName);
            $data->immu_record = '/uploaded/student/admission/' . $imageName;
        }
        //Proof of address*
        $image = $request->file('proof_address');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->proof_address;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student/admission'), $imageName);
            $data->proof_address = '/uploaded/student/admission/' . $imageName;
        }
        //Guardians picture
        $image = $request->file('guard_pic');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->guard_pic;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student/admission'), $imageName);
            $data->guard_pic = '/uploaded/student/admission/' . $imageName;
        }
        //physical health report from the
        $image = $request->file('physical_health');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->physical_health;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student/admission'), $imageName);
            $data->physical_health = '/uploaded/student/admission/' . $imageName;
        }
        //most recent report card from previous school*
        $image = $request->file('mrrcfps');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->mrrcfps;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student/admission'), $imageName);
            $data->mrrcfps = '/uploaded/student/admission/' . $imageName;
        }
        //Homeschooling registration acceptance letter*
        $image = $request->file('hsral');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->hsral;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/student/admission'), $imageName);
            $data->hsral = '/uploaded/student/admission/' . $imageName;
        }
        $data->save();

        $info = StudentInfo::find($request->studentinfo_id);
        $info->date_of_birth         = $request->date_of_birth;
        $info->place_of_birth        = $request->place_of_birth;
        $info->address             = $request->h_address;
        $info->city                  = $request->city;
        $info->state                 = $request->state;
        $info->zip_code              = $request->zip_code;
        $info->blood                  = $request->blood;
        $info->father_name           = $request->father_name;
        $info->father_email           = $request->father_email;
        $info->father_call           = $request->father_call;
        $info->mother_name           = $request->mother_name;
        $info->mother_email           = $request->mother_email;
        $info->mother_call           = $request->mother_call;
        $info->e_name                = $request->e_name;
        $info->e_call                = $request->e_call;
        $info->student_type          = $request->student_type;

        $info->save();
        $notification = array(
            'message' => 'Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function status(Request $request, $id)
    {
        $data = Studentadmission::find($id);
        if ($request->status == 1) {
            $data->status = $request->status;
        } else {
            $data->status = 0;
        }

        $data->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
