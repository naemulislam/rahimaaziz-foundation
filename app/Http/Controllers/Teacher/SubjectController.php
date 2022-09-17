<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Educlass;
use App\Models\Subject;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    public function index()
    {
        $data["categorys"] = Category::where('status',1)->get();
        $data["classs"] = Educlass::where('status',1)->get();
        $data["subjects"] = Subject::latest()->get();
        return view('backend.dashboard.teacher.subject.index-subject',$data);
    }
}
