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
            $table->unsignedBigInteger('id_pay');
            $table->unsignedBigInteger('id_fee');
            $table->decimal('amount', 10, 2);
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_pay')
                  ->references('id_pay')
                  ->on('payments')
                  ->onDelete('cascade');

            $table->foreign('id_fee')
                  ->references('id_fee')
                  ->on('fees')
                  ->onDelete('cascade');
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
