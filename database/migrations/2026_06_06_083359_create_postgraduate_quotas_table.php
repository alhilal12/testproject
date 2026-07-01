<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('postgraduate_quotas', function (Blueprint $table) {
            $table->id();
            $table->string('competition_number')->nullable();
            $table->string('university_name_tr');
            $table->string('university_name_ar');
            $table->string('fee')->nullable();
            $table->string('city')->nullable();
            $table->date('registration_start')->nullable();
            $table->date('registration_end')->nullable();
            $table->date('results_date')->nullable();
            $table->json('accepted_certificates')->nullable();
            $table->text('details')->nullable();
            $table->string('application_method')->nullable();
            $table->string('local_rank')->nullable();
            $table->string('program_level')->nullable(); // master, phd
            $table->string('program_name')->nullable(); // اسم البرنامج
            $table->foreignId('university_id')->nullable()->constrained('universities')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('postgraduate_quotas');
    }
};