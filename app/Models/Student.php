<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id_student';
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'active',
    ];

    // Relaciones
    public function careers()
    {
        return $this->belongsToMany(Career::class, 'student_careers', 'id_student', 'id_career')
                    ->withTimestamps()
                    ->withPivot('enrollment_date', 'graduation_date', 'active');
    }

    public function semesters()
    {
        return $this->belongsToMany(Semester::class, 'student_semesters', 'id_student', 'id_semester')
                    ->withTimestamps()
                    ->withPivot('start_date', 'end_date', 'status');
    }

    public function fees()
    {
        return $this->hasMany(Fee::class, 'id_student');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'id_student');
    }

    public function payCards()
    {
        return $this->hasMany(PayCard::class, 'id_student');
    }
}
