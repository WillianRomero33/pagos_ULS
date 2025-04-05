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
        Schema::create('student_careers', function (Blueprint $table) {
            $table->id('id_student_career');
            $table->foreignId('id_student')->constrained('students', 'id_student');
            $table->foreignId('id_career')->constrained('careers', 'id_career');
            $table->date('inscription_date');
            $table->date('graduation_date')->nullable();    
            $table->boolean('is_active')->default(true);
            $table->unique(['id_student','id_career']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_careers');
    }
};
