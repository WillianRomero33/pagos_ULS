<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'id_pay';
    protected $fillable = [
        'id_student',
        'id_card',
        'payment_date',
        'payment_type',
        'amount',
        'transaction_code',
        'status',
        'receipt_number',
    ];

    // Relaciones
    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student');
    }

    public function card()
    {
        return $this->belongsTo(PayCard::class, 'id_card');
    }

    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetail::class, 'id_pay');
    }
}
