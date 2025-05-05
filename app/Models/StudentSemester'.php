<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentSemester extends Pivot
{
    use HasFactory;

    protected $table = 'student_semesters';
    protected $fillable = [
        'id_student',
        'id_semester',
        'start_date',
        'end_date',
        'status',
    ];
}
