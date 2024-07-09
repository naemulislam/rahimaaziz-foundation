<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function parent(){
        return $this->belongsTo(User::class,'parent_id');
    }
    public function user(){
        return $this->belongsToMany(Children::class,'parent_id');
    }
}
