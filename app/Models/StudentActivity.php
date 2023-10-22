<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentActivity extends Model
{
    use HasFactory;

    public function class(){
        return $this->belongsTo(Educlass::class,'class_id','id');
    }
    public function student(){
        return $this->belongsTo(Studentadmission::class,'admission_id','id');
    }
}
