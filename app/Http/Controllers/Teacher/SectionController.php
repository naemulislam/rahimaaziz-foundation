<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Educlass;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $categorys = Category::where('status',1)->get();
        $classs = Educlass::where('status',1)->get();
        $data = Section::latest()->get();
        return view('backend.dashboard.teacher.academic.category.index-section',compact('data','categorys','classs'));
    }
}
