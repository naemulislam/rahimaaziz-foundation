<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    protected $table = 'teacher_attendances';
    public static function getTeacherAttendance(){
        $record = DB::table();
    }
}
