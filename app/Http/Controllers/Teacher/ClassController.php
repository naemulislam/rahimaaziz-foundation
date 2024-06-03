<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Educlass;
use App\Repositories\GroupRepository;

class ClassController extends Controller
{
   public function index(){
    $data = GroupRepository::query()->orderBy('order','asc')->get();
    return view('backend.teacher.dashboard.academic.group_index',compact('data'));
   }
}
