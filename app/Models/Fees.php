<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function admission(){
        return $this->belongsTo(Studentadmission::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
}
