<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function studentGrades()
   {
       return $this->hasMany('App\Models\Grade', 'student_id', 'id');
   }
//    public function studentLectures()
//     {
//         return $this->hasMany('App\Models\Lecture', 'student_id', 'id');
//     }
    
}
