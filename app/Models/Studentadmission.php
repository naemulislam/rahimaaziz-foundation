<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentActivity;

class Studentadmission extends Model
{
    use HasFactory;
    //protected $fillable = ['name'];
    protected $guarded =['id'];

    public function student(){
       return $this->belongsTo(Student::class);
    }
    public function studentinfo(){
       return $this->belongsTo(StudentInfo::class, 'student_id');
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    // public function activity(){
    //     return $this->belongsTo(Activity::class,'id','id');
    // }
}
