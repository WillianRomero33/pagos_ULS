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
        Schema::create('student_semesters', function (Blueprint $table) {
            $table->id('id_student_semester');
            $table->foreignId('id_student')->constrained('students', 'id_student');
            $table->foreignId('id_semester')->constrained('semesters', 'id_semester');
            $table->date('start_date');
            $table->date('end_date')->nullable();    
            $table->boolean('is_active')->default(true);
            $table->enum('status', ['En curso', 'Completado', 'Abandonado'])->default('En curso');
            $table->unique(['id_student','id_semester']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_semesters');
    }
};
