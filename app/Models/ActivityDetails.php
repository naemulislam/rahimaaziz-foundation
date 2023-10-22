<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityDetails extends Model
{
    use HasFactory;
    public function activityList()
    {
        return $this->belongsTo(ActivityList::class,'list_id','id');
    }
    public function activity()
    {
        return $this->belongsTo(StudentActivity::class,'activity_id','id');
    }
    
}
