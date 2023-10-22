<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'attendance_date',
        'attendance_time',
        'attendence_status'

    ];
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id','id');
    }
    protected $table = 'teacher_attendances';
    public static function getTeacherAttendance(){
        $record = DB::table();
    }
}
