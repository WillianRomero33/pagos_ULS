<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;

    protected $table = 'fees';
    protected $primaryKey = 'id_fee';
    protected $fillable = [
        'amount',
        'description',
    ];

    // Relaciones
    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student');
    }

    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetail::class, 'id_fee');
    }
}
