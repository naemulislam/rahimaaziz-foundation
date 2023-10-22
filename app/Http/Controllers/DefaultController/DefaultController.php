<?php

namespace App\Http\Controllers\DefaultController;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Educlass;
use App\Models\Section;
use App\Models\Student;
use App\Models\Studentadmission;
use App\Models\Subject;
use App\User;

class DefaultController extends Controller
{
    public function get_class($id)
    {
        $data = Educlass::where('category_id', $id)->get();
        return response()->json($data);
    }
    public function studentGet($id)
    {
        $data = Studentadmission::where('class_id', $id)
        ->where('status',1)
        ->with('class', 'student')
        ->get();
        return response()->json($data);
    }

    public function get_student($id)
    {

        $html = '';
        $stu['student'] = Studentadmission::with('class', 'student')->where('class_id', $id)->where('status', 1)->Orderby('roll','asc')->get();
        // $get_id = $data['student']->id;

        foreach ($stu['student'] as $key => $data) {
            $sl_num = $key + 1;
            $html .= '<tr>
                    <input type="hidden" name="admi_id" value= "  ' . $data->id . '" >
                    <td> ' . $sl_num . ' </td>
                    <td> ' . $data->student->name . '  </td>
                    <td> ' . $data->class->class_name . ' </td> 
                    <td> ' . $data->roll . '  </td> 
                    <td>
                    <span class="switch">
                        <label>
                            <input type="checkbox" name="attendance[' . $data->id . ']" value="1"/>
                            <span></span>
                        </label>
                    </span>
                    </td> 
                    <td>
                    <span class="switch">
                        <label>
                            <input type="checkbox" name="attendance[' . $data->id . ']" value="0"/>
                            <span></span>
                        </label>
                    </span>
                    </td> 
                    <td>
                    <span class="switch">
                        <label>
                            <input type="checkbox" name="attendance[' . $data->id . ']" value="2"/>
                            <span></span>
                        </label>
                    </span>
                    </td> 
                    <td>
                    <span class="switch">
                        <label>
                            <input type="checkbox" name="attendance[' . $data->id . ']" value="3"/>
                            <span></span>
                        </label>
                    </span>
                    </td> 
                    </tr>';
        }
        return $html;
    }
    public function get_activity($id)
    {
        $data = Studentadmission::with('class', 'student', 'category')->where('class_id', $id)->where('status', 1)->get();
        return response()->json($data);
    }
}
