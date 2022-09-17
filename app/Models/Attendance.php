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
}
