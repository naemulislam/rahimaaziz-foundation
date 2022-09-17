<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function class(){
        return $this->belongsTo(Educlass::class,'class_id','id');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id','id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
