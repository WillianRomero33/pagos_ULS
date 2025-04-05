<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function careers()
    {
        return $this->belongsToMany(
            Career::class, 'student_career', 
            'id_student', 
            'id_career')
            ->withPivot('inscription_date', 'graduation_date', 'is_active');
    }

    public function semesters()
    {
        return $this->hasMany(
            Semester::class, 'id_student');
    }
    public function payCards()
    {
        return $this->hasMany(Pay_card::class, 'id_student');
    }
}
