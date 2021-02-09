<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    public function gradeStudent()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }
    public function gradeLecture()
    {
        return $this->belongsTo('App\Models\Lecture', 'lecture_id', 'id');
    }
 
}
