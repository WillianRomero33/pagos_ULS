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
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_student')->constrained('students', 'id_student');
            $table->unsignedBigInteger('id_payment')->nullable();
            $table->unsignedBigInteger('id_semester');
            $table->unsignedBigInteger('id_fee');
            $table->unsignedBigInteger('id_month')->nullable();
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['completado', 'pendiente', 'fallido', 'reembolsado'])->default('pendiente');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_payment')
                  ->nullable()
                  ->references('id_payment')
                  ->on('payments')
                  ->onDelete('cascade');

            $table->foreign('id_fee')
                  ->references('id_fee')
                  ->on('fees')
                  ->onDelete('cascade');

            $table->foreign('id_semester')
                  ->references('id_semester')
                  ->on('semesters')
                  ->onDelete('cascade');

            $table->foreign('id_month')
                  ->references('id')
                  ->on('month');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
