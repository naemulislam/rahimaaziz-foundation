<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Educlass;

class ClassController extends Controller
{
   public function index(){
    $data = Educlass::latest()->get();
    return view('backend.dashboard.teacher.academic.category.index-class',compact('data'));
   }
}
