<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id_payment');
            $table->foreignId('id_payment_card')->nullable()->constrained('payment_cards', 'id_payment_card');
            $table->dateTime('payment_date')->nullable();
            $table->enum('payment_type', ['Tarjeta', 'Efectivo', 'Transferencia'])->nullable();
            $table->string('transaction_code', 50)->nullable();
            $table->string('receipt_number', 20)->nullable();
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
