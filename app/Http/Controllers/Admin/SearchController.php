<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Studentadmission;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class SearchController extends Controller
{
    public function studentSearch(Request $request)
    {
        // $get_valu = '%'.$request->search.'%';
        // $get_student = Studentadmission::where('id_number','LIKE',$get_valu)->get();
        // return $get_student;
        return "Hello";
    }
}
