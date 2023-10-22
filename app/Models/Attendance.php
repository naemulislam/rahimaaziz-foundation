<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'admission_id',
        'class_id' ,
        'attendance_date',
        'attendance_time',
        'attendence_status'

    ];

    public function class(){
        return $this->belongsTo(Educlass::class,'class_id','id');
    }
}
