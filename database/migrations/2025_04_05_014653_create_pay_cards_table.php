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
        Schema::create('pay_cards', function (Blueprint $table) {
            $table->id('id_pay_card');
            $table->foreignId('id_student')->constrained('students', 'id_student');
            $table->binary('encrypted_card_number');
            $table->binary('encrypted_due_date');
            $table->binary('encrypted_cvv');
            $table->binary('encrypted_cardholder_name');
            $table->enum('card_type', ['Visa','MasterCard','American Express', 'Otro']);
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_cards');
    }
};
