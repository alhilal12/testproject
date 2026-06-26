<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('university_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')->constrained('universities')->onDelete('cascade');
            $table->string('program_name_ar');        // اسم البرنامج بالعربية
            $table->string('program_name_tr')->nullable(); // اسم البرنامج بالتركية
            $table->enum('level', ['bachelor', 'master', 'phd', 'diploma']); // بكالوريوس، ماجستير، دكتوراه، دبلوم
            $table->string('language')->nullable();    // لغة الدراسة
            $table->decimal('fee', 12, 2)->nullable(); // الرسوم الدراسية
            $table->integer('duration')->nullable();   // مدة الدراسة بالسنوات
            $table->text('description')->nullable();   // وصف البرنامج
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('university_programs');
    }
};