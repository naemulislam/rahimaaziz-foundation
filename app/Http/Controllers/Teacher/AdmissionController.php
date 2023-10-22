<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Studentadmission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
      $data = Studentadmission::where('status', 1)->get();
      return view('backend.dashboard.teacher.admission.student-list', compact('data'));
    }

    public function show($slug)
    {
      $data = Student::where('slug', $slug)->first();
      $productCode = rand(1234567890,50);
      return view('backend.dashboard.admin.admission.request-dtls', compact('data'),['productCode'=>$productCode]);
    }
}
