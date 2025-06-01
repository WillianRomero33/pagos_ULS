<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $table = 'payment_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_student',
        'id_payment',
        'id_semester',
        'id_month',
        'id_fee',
        'amount',
        'status',
    ];

    // Relaciones
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class, 'id_fee');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student');
    }

    public function month()
    {
        return $this->belongsTo(Month::class, 'id_month');
    }
}
