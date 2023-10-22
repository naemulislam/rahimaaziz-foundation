<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo(Studentadmission::class,'student_id','id');
    }
    public function parent(){
        return $this->belongsTo(User::class,'parent_id','id');
    }
}
