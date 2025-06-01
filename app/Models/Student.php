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
        'id_user',
        'carnet',
        'name',
        'last_name',
        'email',
        'active',
    ];

    // Relaciones
    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function careers()
    {
        return $this->belongsToMany(Career::class, 'student_careers', 'id_student', 'id_career')
                    ->withTimestamps()
                    ->withPivot('inscription_date', 'graduation_date', 'active');
    }

    public function semesters()
    {
        return $this->belongsToMany(Semester::class, 'student_semesters', 'id_student', 'id_semester')
                    ->withTimestamps()
                    ->withPivot('start_date', 'end_date', 'status');
    }

    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetail::class, 'id_student');
    }

    public function paymentCards()
    {
        return $this->hasMany(PaymentCard::class, 'id_student');
    }
}
