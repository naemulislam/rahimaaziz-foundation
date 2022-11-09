<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'admission_id',
        'category_id',
        'class_id' ,
        'subject_id',
        'section_id',
        'attendance_date',
        'attendance_time',
        'p_a'

    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function class(){
        return $this->belongsTo(Educlass::class,'class_id','id');
    }
}
