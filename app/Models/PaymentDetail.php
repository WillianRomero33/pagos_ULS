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
        'id_pay',
        'id_fee',
        'amount',
    ];

    // Relaciones
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_pay');
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class, 'id_fee');
    }
}
