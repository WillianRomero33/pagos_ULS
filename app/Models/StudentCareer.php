<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentCareer extends Pivot
{
    use HasFactory;

    protected $table = 'student_careers';
    protected $fillable = [
        'id_student',
        'id_career',
        'inscription_date',
        'graduation_date',
        'active',
    ];
}
