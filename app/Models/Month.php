<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Month extends Model
{
    use HasFactory;

    protected $table = 'month';
    protected $primaryKey = 'id';
    protected $fillable = [
      'name'
    ];

    // Relaciones
    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetail::class, 'id_month', 'id');
    }
}
