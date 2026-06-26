<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('university_quotas', function (Blueprint $table) {
            $table->id();
            $table->string('competition_number')->nullable();           // رقم المفاضلة
            $table->string('university_name_tr');                        // اسم الجامعة بالتركي
            $table->string('university_name_ar');                        // اسم الجامعة بالعربي
            $table->string('fee')->nullable();                           // الأجرة
            $table->string('city')->nullable();                          // المدينة
            $table->date('registration_start')->nullable();              // بدء التسجيل
            $table->date('registration_end')->nullable();                // انتهاء التسجيل
            $table->date('results_date')->nullable();                    // النتائج
            $table->text('accepted_certificates')->nullable();           // الشهادات المقبولة
            $table->text('details')->nullable();                         // التفاصيل
            $table->string('application_method')->nullable();            // نوع التقديم
            $table->string('local_rank')->nullable();                    // الترتيب المحلي
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('university_quotas');
    }
};