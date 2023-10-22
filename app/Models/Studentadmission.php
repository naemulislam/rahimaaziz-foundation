<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentActivity;

class Studentadmission extends Model
{
    use HasFactory;
    //protected $fillable = ['name'];

    public function student(){
       return $this->belongsTo(Student::class,'student_id','id');
    }
    public function studentinfo(){
       return $this->belongsTo(StudentInfo::class,'student_id','student_id');
    }
    public function class(){
        return $this->belongsTo(Educlass::class,'class_id','id');
    }
    public function activity(){
        return $this->belongsTo(Activity::class,'id','id');
    }
}
