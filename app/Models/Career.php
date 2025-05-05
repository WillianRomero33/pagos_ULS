<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
{
    use HasFactory;

    protected $table = 'careers';
    protected $primaryKey = 'id_career';
    protected $fillable = [
        'career_name',
        'total_semesters',
    ];

    // Relaciones
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_careers', 'id_career', 'id_student')
                    ->withTimestamps();
    }
}
