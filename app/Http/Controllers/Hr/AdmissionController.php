<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Student;
use App\Models\Studentadmission;
use App\Models\StudentInfo;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = Studentadmission::where('status', 1)->get();
    return view('backend.dashboard.admin.admission.student-list', compact('data'));
  }
  public function pandingindex()
  {
    $data = Studentadmission::where('status', 0)->get();
    // return $data;

    return view('backend.dashboard.admin.admission.request-list', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data["categorys"] = Category::where('status', 1)->get();
    $data["students"] = Student::where('status', 1)->get();
    return view('backend.dashboard.admin.admission.admission', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'admission_no' => 'required',
      'roll' => 'required',
      'registration_no' => 'required',
      'category_id' => 'required',
      'class_id' => 'required',
      'admission_date' => 'required',
      'date_of_birth' => 'required',
      'place_of_birth' => 'required',
      'student_id' => 'required',
      'gender' => 'required',
      'admi_photo' => 'required',
      'h_address' => 'required',
      'city' => 'required',
      'state' => 'required',
      'zip_code' => 'required',
      'father_name' => 'required',
      'father_call' => 'required',
      'mother_name' => 'required',
      'mother_call' => 'required'
    ]);


    $rowcount = Studentadmission::where('student_id', $request->student_id)->count();
    if ($rowcount == 0) {


      $id_date  = date('ymd');
      $id_number = Studentadmission::latest()->first();
      if ($id_number) {
        $removed1char = substr($id_number->id_number, 6);
        $generate_id = $stpad = $id_date . str_pad($removed1char + 1, 2, "0", STR_PAD_LEFT);
      } else {
        $generate_id = $id_date . str_pad(1, 2, "0", STR_PAD_LEFT);
      }

      $data = new Studentadmission();
      $data->id_number             = $generate_id;

      $data->student_id            = $request->student_id;
      $data->admission_no         = $request->admission_no;
      $data->admission_date       = $request->admission_date;
      $data->roll                 = $request->roll;
      $data->registration_no      = $request->registration_no;
      $data->category_id           = $request->category_id;
      $data->class_id              = $request->class_id;
      $data->section_id              = $request->section_id;
      $data->admi_phone            = $request->admi_phone;

      $data->payment_type          = "Hand Cash";
      $data->payment_status        = 2;

      $image = $request->file('admi_photo');
      if ($image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploaded/student/admission'), $imageName);
        $data->admi_photo = '/uploaded/student/admission/' . $imageName;
      }

      $data->save();



      $rowcount = StudentInfo::where('student_id', $request->student_id)->count();
      if ($rowcount == 0) {
        $info = new StudentInfo();
        $info->student_id            = $request->student_id;
        $info->date_of_birth         = $request->date_of_birth;
        $info->place_of_birth        = $request->place_of_birth;
        $info->gender                = $request->gender;
        $info->h_address             = $request->h_address;
        $info->city                  = $request->city;
        $info->state                 = $request->state;
        $info->zip_code              = $request->zip_code;
        $info->blood                  = $request->blood;
        $info->apartment              = $request->apartment;
        $info->father_name           = $request->father_name;
        $info->father_call           = $request->father_call;
        $info->father_email           = $request->father_email;
        $info->fbp                    = $request->fbp;
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
        $info->gender                = $request->gender;
        $info->h_address             = $request->h_address;
        $info->city                  = $request->city;
        $info->state                 = $request->state;
        $info->zip_code              = $request->zip_code;
        $info->blood                  = $request->blood;
        $info->apartment              = $request->apartment;
        $info->father_name           = $request->father_name;
        $info->father_call           = $request->father_call;
        $info->mother_name           = $request->mother_name;
        $info->mother_call           = $request->mother_call;
        $info->e_name                = $request->e_name;
        $info->e_call                = $request->e_call;
        $info->student_type          = $request->student_type;
        $info->save();
      }

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
    $data["categorys"] = Category::where('status', 1)->get();
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
      'roll' => 'required',
      'registration_no' => 'required',
      'admission_date' => 'required',
      'date_of_birth' => 'required',
      'place_of_birth' => 'required',
      'gender' => 'required',
      'h_address' => 'required',
      'city' => 'required',
      'state' => 'required',
      'zip_code' => 'required',
      'father_name' => 'required',
      'father_call' => 'required',
    ]);

    $data = Studentadmission::find($id);
    $data->id_number             = $request->id_number;
    $data->admission_no         = $request->admission_no;
    $data->admission_date       = $request->admission_date;
    $data->roll                 = $request->roll;
    $data->registration_no      = $request->registration_no;
    $data->category_id           = $request->category_id;
    $data->class_id              = $request->class_id;
    $data->section_id              = $request->section_id;
    $data->admi_phone            = $request->admi_phone;
    $image = $request->file('image');
      if ($image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image_path = $data->admi_photo;
        @unlink(public_path($image_path));
        $image->move(public_path('uploaded/student/admission'), $imageName);
        $data->admi_photo = '/uploaded/student/admission/' . $imageName;
      }
    $data->save();

    $info = StudentInfo::find($request->studentinfo_id);
        $info->date_of_birth         = $request->date_of_birth;
        $info->place_of_birth        = $request->place_of_birth;
        $info->gender                = $request->gender;
        $info->h_address             = $request->h_address;
        $info->city                  = $request->city;
        $info->state                 = $request->state;
        $info->zip_code              = $request->zip_code;
        $info->blood                  = $request->blood;
        $info->apartment              = $request->apartment;
        $info->father_name           = $request->father_name;
        $info->father_email           = $request->father_email;
        $info->father_call           = $request->father_call;
        $info->mother_name           = $request->mother_name;
        $info->mother_email           = $request->mother_email;
        $info->mother_call           = $request->mother_call;
        $info->e_name                = $request->e_name;
        $info->e_call                = $request->e_call;
        $info->student_type          = $request->student_type;
        $info->class_type          = $request->class_type;
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
