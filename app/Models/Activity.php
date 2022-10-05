<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo(Studentadmission::class,'admission_id','id');
     }
     public function category(){
         return $this->belongsTo(Category::class,'category_id','id');
     }
     public function class(){
         return $this->belongsTo(Educlass::class,'class_id','id');
     }
}
