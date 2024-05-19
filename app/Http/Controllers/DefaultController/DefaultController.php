<?php

namespace App\Http\Controllers\DefaultController;

use App\Http\Controllers\Controller;
use App\Models\Studentadmission;

class DefaultController extends Controller
{
    public function studentGet($id)
    {
        $data = Studentadmission::where('class_id', $id)
        ->where('status',1)
        ->with('class', 'student')
        ->get();
        return response()->json($data);
    }

    public function geStudent($id)
    {

        $html = '';
        $stu['student'] = Studentadmission::with('group', 'student')->where('group_id', $id)->where('status', 1)->Orderby('roll','asc')->get();

        foreach ($stu['student'] as $key => $data) {
            $sl_num = $key + 1;
            $html .= '<tr>
                    <input type="hidden" name="admission_id" value= "  ' . $data->id . '" >
                    <td> ' . $sl_num . ' </td>
                    <td> ' . $data->student->name . '  </td>
                    <td> ' . $data->group->name . ' </td>
                    <td> ' . $data->roll . '  </td>
                    <td>
                    <span class="switch">
                        <label>
                            <input type="checkbox" name="attendance[' . $data->id . ']" value="1"  class="attendance-checkbox"
                            data-row-id="'. $data->id .'"/>
                            <span></span>
                        </label>
                    </span>
                    </td>
                    <td>
                    <span class="switch">
                        <label>
                            <input type="checkbox" name="attendance[' . $data->id . ']" value="0" class="attendance-checkbox"
                            data-row-id="'. $data->id .'"/>
                            <span></span>
                        </label>
                    </span>
                    </td>
                    <td>
                    <span class="switch">
                        <label>
                            <input type="checkbox" name="attendance[' . $data->id . ']" value="2" class="attendance-checkbox"
                            data-row-id="'. $data->id .'"/>
                            <span></span>
                        </label>
                    </span>
                    </td>
                    <td>
                    <span class="switch">
                        <label>
                            <input type="checkbox" name="attendance[' . $data->id . ']" value="3" class="attendance-checkbox"
                            data-row-id="'. $data->id .'"/>
                            <span></span>
                        </label>
                    </span>
                    </td>
                    </tr>
                    ';
        }
        return $html;
    }
    public function get_activity($id)
    {
        $data = Studentadmission::with('class', 'student', 'category')->where('class_id', $id)->where('status', 1)->get();
        return response()->json($data);
    }
}
