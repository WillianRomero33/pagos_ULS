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
        'id_card',
        'payment_date',
        'payment_type',
        'transaction_code',
        'receipt_number',
    ];

    // Relaciones
    public function card()
    {
        return $this->belongsTo(PaymentCard::class, 'id_payment_card');
    }

    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetail::class, 'id_payment');
    }
}
