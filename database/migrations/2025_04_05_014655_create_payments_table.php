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
            $table->id('id_pay');
            $table->foreignId('id_student')->constrained('students', 'id_student');
            $table->foreignId('id_card')->nullable()->constrained('pay_cards', 'id_pay_card');
            $table->dateTime('payment_date');
            $table->enum('payment_type', ['Tarjeta', 'Efectivo', 'Transferencia']);
            $table->decimal('amount', 10, 2);
            $table->string('transaction_code', 50)->nullable();
            $table->enum('status', ['completado', 'pendiente', 'fallido', 'reembolsado'])->default('pendiente');
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
