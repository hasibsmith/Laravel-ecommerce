<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class School_class extends Model
{
    use HasFactory;
    public function student()
    {
      
        return $this->hasMany(Student::class);
    }
}
