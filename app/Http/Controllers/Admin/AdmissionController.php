<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Educlass;
use App\Models\Student;
use App\Models\Studentadmission;
use App\Models\StudentInfo;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $data = Studentadmission::where('status', 1)->get();
        return view('backend.dashboard.admin.admission.student-list', compact('data'));
    }
    public function pandingindex()
    {
        $data = Studentadmission::where('status', 0)->get();
        return view('backend.dashboard.admin.admission.request-list', compact('data'));
    }

    public function create()
    {
        $data["class_group"] = Educlass::where('status', 1)->get();
        $data["students"] = Student::where('status', 1)->get();
        return view('backend.dashboard.admin.admission.admission', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'admission_no' => 'required',
            'roll' => 'required',
            'registration_no' => 'required',
            'class_id' => 'required',
            'admi_name' => 'required',
            'student_type' => 'required',
            'student_id' => 'required',
            'admission_date' => 'required',
            'admi_phone' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'h_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'father_name' => 'required',
            'father_call' => 'required',
            'mother_name' => 'required',
            'mother_call' => 'required',
            'admi_photo' => 'required'
        ]);


        $rowcount = Studentadmission::where('student_id', $request->student_id)->count();
        if ($rowcount == 0) {

            $generate_id  = random_int(10000000, 99999999);

            $data = new Studentadmission();
            $data->id_number             = $generate_id;

            $data->student_id            = $request->student_id;
            $data->admission_no         = $request->admission_no;
            $data->admission_date       = $request->admission_date;
            $data->roll                 = $request->roll;
            $data->registration_no      = $request->registration_no;
            $data->admi_name           = $request->admi_name;
            $data->class_id              = $request->class_id;
            $data->admi_phone            = $request->admi_phone;
            $data->payment_type          = "Hand Cash";
            $data->payment_status        = 2;

            $image = $request->file('admi_photo');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/student/admission'), $imageName);
                $data->admi_photo = '/uploaded/student/admission/' . $imageName;
            }
            // Birth Cirtificate
            $image = $request->file('b_cirti');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/student/admission'), $imageName);
                $data->b_cirti = '/uploaded/student/admission/' . $imageName;
            }
            //Immunization record*
            $image = $request->file('immu_record');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/student/admission'), $imageName);
                $data->immu_record = '/uploaded/student/admission/' . $imageName;
            }
            //Proof of address*
            $image = $request->file('proof_address');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/student/admission'), $imageName);
                $data->proof_address = '/uploaded/student/admission/' . $imageName;
            }
            //Guardians picture
            $image = $request->file('guard_pic');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/student/admission'), $imageName);
                $data->guard_pic = '/uploaded/student/admission/' . $imageName;
            }
            //physical health report from the
            $image = $request->file('physical_health');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/student/admission'), $imageName);
                $data->physical_health = '/uploaded/student/admission/' . $imageName;
            }
            //most recent report card from previous school*
            $image = $request->file('mrrcfps');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/student/admission'), $imageName);
                $data->mrrcfps = '/uploaded/student/admission/' . $imageName;
            }
            //Homeschooling registration acceptance letter*
            $image = $request->file('hsral');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/student/admission'), $imageName);
                $data->hsral = '/uploaded/student/admission/' . $imageName;
            }

            $data->save();



            $rowcount = StudentInfo::where('student_id', $request->student_id)->count();
            if ($rowcount == 0) {
                $info = new StudentInfo();
                $info->student_id            = $request->student_id;
                $info->date_of_birth         = $request->date_of_birth;
                $info->place_of_birth        = $request->place_of_birth;
                $info->address             = $request->h_address;
                $info->city                  = $request->city;
                $info->state                 = $request->state;
                $info->zip_code              = $request->zip_code;
                $info->blood                  = $request->blood;
                $info->father_name           = $request->father_name;
                $info->father_call           = $request->father_call;
                $info->father_email           = $request->father_email;
                $info->mother_name           = $request->mother_name;
                $info->mother_call           = $request->mother_call;
                $info->e_name                = $request->e_name;
                $info->e_call                = $request->e_call;
                $info->student_type          = $request->student_type;
                $info->save();
            } else {
                $info = StudentInfo::find($request->student_id);
                $info->date_of_birth         = $request->date_of_birth;
                $info->place_of_birth        = $request->place_of_birth;
                $info->address             = $request->h_address;
                $info->city                  = $request->city;
                $info->state                 = $request->state;
                $info->zip_code              = $request->zip_code;
                $info->blood                  = $request->blood;
                $info->father_name           = $request->father_name;
                $info->father_call           = $request->father_call;
                $info->mother_name           = $request->mother_name;
                $info->mother_call           = $request->mother_call;
                $info->e_name                = $request->e_name;
                $info->e_call                = $request->e_call;
                $info->student_type          = $request->student_type;
                $info->save();
            }
            //   $get_id = Student::find( $request->student_id);
            //   $data = array(
            //     'name' => $get_id->name,
            //     'email' => $get_id->email

            // );

            //Mail::to($data['email'])->send(new StudentMail($data));
            $notification = array(
                'message' => 'Admission Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Already admitted here.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data['student'] = Student::where('slug', $slug)->first();
        $student_id = $data['student']->id;
        $data['admission'] = Studentadmission::where('student_id', $student_id)->first();
        $activity_id = $data['admission']->id;

        $data['studentinfo'] = StudentInfo::where('student_id', $student_id)->first();

        // \QrCode::size(500)
        //         ->format('png')
        //         ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));
        return view('backend.dashboard.admin.admission.admission-dtls', $data);
    }
    public function pandingshow($slug)
    {
        $data = Student::where('slug', $slug)->first();
        return view('backend.dashboard.admin.admission.request-dtls', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data['student'] = Student::where('slug', $slug)->first();
        $student_id = $data['student']->id;
        $data['admission'] = Studentadmission::where('student_id', $student_id)->first();
        $data['studentinfo'] = StudentInfo::where('student_id', $student_id)->first();
        $data['class_group'] = Educlass::where('status', 1)->get();

        return view('backend.dashboard.admin.admission.edit-admission', $data);
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
