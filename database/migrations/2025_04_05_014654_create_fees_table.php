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
        Schema::create('fees', function (Blueprint $table) {
            $table->id('id_fee');
            $table->foreignId('id_student')->constrained('students', 'id_student');
            $table->float('amount', 2);
            $table->date('due_date')->nullable();
            $table->enum('status',['Pendiente', 'Pagado', 'Vencido'])->default('Pendiente');
            $table->string('description', 100);
            $table->unique('id_student');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
