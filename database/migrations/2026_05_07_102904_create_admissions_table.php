<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')->constrained()->onDelete('cascade');
            $table->enum('level', ['bachelor', 'postgraduate']);
            $table->string('name_ar'); // المفاضلة الأولى 2025
            $table->integer('order')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->date('results_date')->nullable();
            $table->boolean('is_expired')->default(false);
            $table->json('required_exams')->nullable(); // ["TR-YÖS", "SAT", "TR-DIPLOMA"]
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};