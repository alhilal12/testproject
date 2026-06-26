<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('consultations', function (Blueprint $table) {
            // جعل الأعمدة اختيارية
            $table->foreignId('university_id')->nullable()->change();
            $table->foreignId('major_id')->nullable()->change();
            $table->enum('education_level', ['bachelor', 'master', 'phd'])->nullable()->change();
            $table->enum('study_language', ['turkish', 'english', 'arabic'])->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->foreignId('university_id')->nullable(false)->change();
            $table->foreignId('major_id')->nullable(false)->change();
            $table->enum('education_level', ['bachelor', 'master', 'phd'])->nullable(false)->change();
            $table->enum('study_language', ['turkish', 'english', 'arabic'])->nullable(false)->change();
        });
    }
};