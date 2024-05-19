<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function admission(){
        return $this->belongsTo(Studentadmission::class);
    }
}
