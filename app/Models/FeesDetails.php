<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesDetails extends Model
{
    use HasFactory;
    public function fees(){
        return $this->belongsTo(Fees::class,'fees_id','id');
    }
}
