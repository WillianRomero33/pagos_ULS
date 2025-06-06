<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentCard extends Model
{
    use HasFactory;

    protected $table = 'payment_cards';
    protected $primaryKey = 'id_payment_card';
    protected $fillable = [
        'id_student',
        'card_number_encrypted',
        'expiration_date_encrypted',
        'cvv_encrypted',
        'card_holder_encrypted',
    ];

    // Relaciones
    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'id_payment_card');
    }
}
