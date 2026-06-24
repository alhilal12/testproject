<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('country_recognitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')->constrained('universities')->onDelete('cascade');
            $table->string('country_code', 3); // مثل SA, EG, JO, SY, TR
            $table->string('country_name_ar'); // السعودية، مصر، الأردن...
            $table->string('country_name_en')->nullable();
            $table->text('notes')->nullable(); // ملاحظات إضافية
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // منع التكرار (نفس الجامعة + نفس الدولة)
            $table->unique(['university_id', 'country_code']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('country_recognitions');
    }
};