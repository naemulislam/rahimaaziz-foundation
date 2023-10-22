<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Children;
use App\Models\DailyReport;
use App\Models\Studentadmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
{
    public function index()
    {
        $data['children'] = Children::where('parent_id',Auth::user()->id)->get();
        $data['countChildren'] = Children::where('parent_id',Auth::user()->id)->count();
       
        return view('backend.dashboard.parent.report.child', $data);

    }
    public function show($id)
    {
        $stu = Children::find($id);
        $data['student'] = Studentadmission::where('id',$stu->student_id)->first();
        $getId = $data['student'];

        $data['getReport'] = DailyReport::where('admission_id',$getId->id)->where('class_id',$getId->class_id)->get();
        return view('backend.dashboard.parent.report.report-index', $data);
    }
    public function reportShow($id)
    {
        $data = DailyReport::find($id);
        return view('backend.dashboard.parent.report.show',compact('data'));
       
    }


}
