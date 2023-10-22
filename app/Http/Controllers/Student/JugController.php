<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use App\Models\Studentadmission;
use Illuminate\Http\Request;

class JugController extends Controller
{
    public function jugIndex()
    {
        $stuId = Studentadmission::where('student_id',Auth('student')->user()->id)->where('status',1)->first();
        // $rowCount = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)->where('para',1)->get();
        //Start Jug Number 1
        $data['paraSum1'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',1)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum1']){
            $data['para1'] = 20-$data['paraSum1'];
        }else{
            $data['para1'] = 0;
        }
        $data['percentage1'] = $data['paraSum1']/20*100;
        //Start Jug Number 2
        $data['paraSum2'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',2)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum2']){
            $data['para2'] = 20-$data['paraSum2'];
        }else{
            $data['para2'] = 0;
        }
        $data['percentage2'] = $data['paraSum2']/20*100;
        //Start Jug Number 3
        $data['paraSum3'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',3)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum3']){
            $data['para3'] = 20-$data['paraSum3'];
        }else{
            $data['para3'] = 0;
        }
        $data['percentage3'] = $data['paraSum3']/20*100;
        //Start Jug Number 4
        $data['paraSum4'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',4)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum4']){
            $data['para4'] = 20-$data['paraSum4'];
        }else{
            $data['para4'] = 0;
        }
        $data['percentage4'] = $data['paraSum4']/20*100;
        //Start Jug Number 5
        $data['paraSum5'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',5)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum5']){
            $data['para5'] = 20-$data['paraSum5'];
        }else{
            $data['para5'] = 0;
        }
        $data['percentage5'] = $data['paraSum5']/20*100;
        //Start Jug Number 6
        $data['paraSum6'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',6)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum6']){
            $data['para6'] = 20-$data['paraSum6'];
        }else{
            $data['para6'] = 0;
        }
        $data['percentage6'] = $data['paraSum6']/20*100;
        //Start Jug Number 7
        $data['paraSum7'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',7)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum7']){
            $data['para7'] = 20-$data['paraSum7'];
        }else{
            $data['para7'] = 0;
        }
        $data['percentage7'] = $data['paraSum7']/20*100;
        //Start Jug Number 8
        $data['paraSum8'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',8)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum8']){
            $data['para8'] = 20-$data['paraSum8'];
        }else{
            $data['para8'] = 0;
        }
        $data['percentage8'] = $data['paraSum8']/20*100;
        //Start Jug Number 9
        $data['paraSum9'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',9)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum9']){
            $data['para9'] = 20-$data['paraSum9'];
        }else{
            $data['para9'] = 0;
        }
        $data['percentage9'] = $data['paraSum9']/20*100;
        //Start Jug Number 10
        $data['paraSum10'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',10)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum10']){
            $data['para10'] = 20-$data['paraSum10'];
        }else{
            $data['para10'] = 0;
        }
        $data['percentage10'] = $data['paraSum10']/20*100;
        //Start Jug Number 11
        $data['paraSum11'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',11)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum11']){
            $data['para11'] = 20-$data['paraSum11'];
        }else{
            $data['para11'] = 0;
        }
        $data['percentage11'] = $data['paraSum11']/20*100;
        //Start Jug Number 12
        $data['paraSum12'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',12)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum12']){
            $data['para12'] = 20-$data['paraSum12'];
        }else{
            $data['para12'] = 0;
        }
        $data['percentage12'] = $data['paraSum12']/20*100;
        //Start Jug Number 13
        $data['paraSum13'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',13)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum13']){
            $data['para13'] = 20-$data['paraSum13'];
        }else{
            $data['para13'] = 0;
        }
        $data['percentage13'] = $data['paraSum13']/20*100;
        //Start Jug Number 14
        $data['paraSum14'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',14)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum14']){
            $data['para14'] = 20-$data['paraSum14'];
        }else{
            $data['para14'] = 0;
        }
        $data['percentage14'] = $data['paraSum14']/20*100;
        //Start Jug Number 15
        $data['paraSum15'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',15)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum15']){
            $data['para15'] = 20-$data['paraSum15'];
        }else{
            $data['para15'] = 0;
        }
        $data['percentage15'] = $data['paraSum15']/20*100;
        //Start Jug Number 16
        $data['paraSum16'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',16)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum16']){
            $data['para16'] = 20-$data['paraSum16'];
        }else{
            $data['para16'] = 0;
        }
        $data['percentage16'] = $data['paraSum16']/20*100;
        //Start Jug Number 17
        $data['paraSum17'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',17)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum17']){
            $data['para17'] = 20-$data['paraSum17'];
        }else{
            $data['para17'] = 0;
        }
        $data['percentage17'] = $data['paraSum17']/20*100;
        //Start Jug Number 18
        $data['paraSum18'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',18)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum18']){
            $data['para18'] = 20-$data['paraSum18'];
        }else{
            $data['para18'] = 0;
        }
        $data['percentage18'] = $data['paraSum18']/20*100;
        //Start Jug Number 19
        $data['paraSum19'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',19)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum19']){
            $data['para19'] = 20-$data['paraSum19'];
        }else{
            $data['para19'] = 0;
        }
        $data['percentage19'] = $data['paraSum19']/20*100;
        //Start Jug Number 20
        $data['paraSum20'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',20)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum20']){
            $data['para20'] = 20-$data['paraSum20'];
        }else{
            $data['para20'] = 0;
        }
        $data['percentage20'] = $data['paraSum20']/20*100;

        //Start Jug Number 21
        $data['paraSum21'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',21)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum21']){
            $data['para21'] = 20-$data['paraSum21'];
        }else{
            $data['para21'] = 0;
        }
        $data['percentage21'] = $data['paraSum21']/20*100;
        //Start Jug Number 22
        $data['paraSum22'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',22)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum22']){
            $data['para22'] = 20-$data['paraSum22'];
        }else{
            $data['para22'] = 0;
        }
        $data['percentage22'] = $data['paraSum22']/20*100;
        //Start Jug Number 23
        $data['paraSum23'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',23)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum23']){
            $data['para23'] = 20-$data['paraSum23'];
        }else{
            $data['para23'] = 0;
        }
        $data['percentage23'] = $data['paraSum23']/20*100;
        //Start Jug Number 4
        $data['paraSum24'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',24)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum24']){
            $data['para24'] = 20-$data['paraSum24'];
        }else{
            $data['para24'] = 0;
        }
        $data['percentage24'] = $data['paraSum24']/20*100;
        //Start Jug Number 25
        $data['paraSum25'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',25)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum25']){
            $data['para25'] = 20-$data['paraSum25'];
        }else{
            $data['para25'] = 0;
        }
        $data['percentage25'] = $data['paraSum25']/20*100;
        //Start Jug Number 26
        $data['paraSum26'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',26)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum26']){
            $data['para26'] = 20-$data['paraSum26'];
        }else{
            $data['para26'] = 0;
        }
        $data['percentage26'] = $data['paraSum26']/20*100;
        //Start Jug Number 27
        $data['paraSum27'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',27)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum27']){
            $data['para27'] = 20-$data['paraSum27'];
        }else{
            $data['para27'] = 0;
        }
        $data['percentage27'] = $data['paraSum27']/20*100;
        //Start Jug Number 28
        $data['paraSum28'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',28)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum28']){
            $data['para28'] = 20-$data['paraSum28'];
        }else{
            $data['para28'] = 0;
        }
        $data['percentage28'] = $data['paraSum28']/20*100;
        //Start Jug Number 29
        $data['paraSum29'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',29)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum29']){
            $data['para29'] = 25-$data['paraSum29'];
        }else{
            $data['para29'] = 0;
        }
        $data['percentage29'] = $data['paraSum29']/25*100;
        //Start Jug Number 30
        $data['paraSum30'] = DailyReport::where('admission_id',$stuId->id)->where('class_id',$stuId->class_id)
        ->where('para',30)
        ->where('teacher_review',1)
        ->sum('page');
        if($data['paraSum10']){
            $data['para30'] = 20-$data['paraSum30'];
        }else{
            $data['para30'] = 0;
        }
        $data['percentage30'] = $data['paraSum30']/20*100;

       return view('backend.dashboard.student.report.jug-index',$data);
    }

    //in this function for report complete index
    public function completeIndex()
    {
        # code...
    }
}
