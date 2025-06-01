<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';
    protected $primaryKey = 'id_semester';
    protected $fillable = [
        'semester_number',
        'duration_months',
        'year',
    ];

    // Relaciones
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_semesters', 'id_semester', 'id_student')
                    ->withTimestamps();
    }

    public function paymentDetails()
    {
        return $this->belongsToMany(Student::class, 'payment_details', 'id_semester', 'id_semester')
                    ->withTimestamps();
    }
}
