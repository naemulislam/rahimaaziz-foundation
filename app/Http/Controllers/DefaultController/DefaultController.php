<?php

namespace App\Http\Controllers\DefaultController;

use App\Http\Controllers\Controller;
use App\Models\Studentadmission;
use App\Repositories\AdmissionRepository;
use App\Repositories\GroupRepository;

class DefaultController extends Controller
{
    public function studentGet($id)
    {
        $data = Studentadmission::with('group', 'student')->where('group_id', $id)->where('status', 1)->Orderby('roll','asc')->get();
        return response()->json($data);
    }

    public function geStudent($id)
    {
        $html = '';
        $students = AdmissionRepository::query()
            ->whereHas('student', function ($query) {
                $query->where('status', true)->where('admission_status', true)->where('status_type', 1);
            })->where('group_id', $id)->Orderby('roll', 'asc')->get();

        foreach ($students as $key => $data) {
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
    public function getGroup($id)
    {
        $group = GroupRepository::query()->where('id', $id)->where('status', true)->first();
        return response()->json($group);

        // $html = '';
        // $html .= '
        //         <div class="col-md-4 mb-2">
        //             <div class="announcement">
        //                 <h4>Monthly Fee: $' . $group->monthly_fee . '</h4>
        //             </div>
        //         </div>';
        // return $html;
    }
    public function get_activity($id)
    {
        $data = Studentadmission::with('class', 'student', 'category')->where('class_id', $id)->where('status', 1)->get();
        return response()->json($data);
    }
}
