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
     public function get_class($id){
        $data = Educlass::where('category_id',$id)->get();
        return response()->json($data);
    }
    public function get_section($id){
        $data = Section::where('class_id',$id)->get();
        return response()->json($data);
    }
    public function get_subject($id){
        $data = Subject::where('category_id',$id)->get();
        return response()->json($data);
    }
    public function get_subject_att($id){
        $data = Subject::where('class_id',$id)->get();
        return response()->json($data);
    }
     public function get_student($id){
    
        $html = '';
        $stu['student'] = Studentadmission::with('class','student','category')->where('class_id',$id)->where('status',1)->get();
        // $get_id = $data['student']->id;
       
        foreach($stu['student'] as $key=> $data){
            $sl_num = $key+1;
            $html .= '<tr>
                    <input type="hidden" name="admi_id[]" value= "  '. $data->id .'" >
                    <td> '. $sl_num. ' </td>
                    <td> '.$data->student->name.'  </td>
                    <td> '.$data->category->category_name.'  </td> 
                    <td> '.$data->class->class_name.' </td> 
                    <td> '.$data->roll.'  </td> 
                    <td><select class="form-control" name="pa[]">
                    <option value="1"> Present </option>
                    <option value="0"> Absent</option>
                    </select> </td> 
                    </tr>';
        }
         return $html;
    }
    public function get_activity($id){
        $data = Activity::with('class','student','category')->where('class_id',$id)->get();
        return response()->json($data);
        
    }

  
    
}
