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
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function class(){
        return $this->belongsTo(Educlass::class,'class_id','id');
    }
    public function activity(){
        return $this->belongsTo(Activity::class,'id','id');
    }
}
