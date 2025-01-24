<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School_class;

class Student extends Model
{
    use HasFactory;
    public function schoolClass()
    {

        return $this->belongsTo(School_class::class,'school_class_id');
    }
}
