<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('institute_university')) {
            Schema::create('institute_university', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('institute_id');
                $table->unsignedBigInteger('university_id');
                $table->timestamps();
                
                $table->foreign('institute_id')->references('id')->on('institutes');
                $table->foreign('university_id')->references('id')->on('universities');
                
                $table->unique(['institute_id', 'university_id'], 'institute_university_institute_id_university_id_unique');
                $table->unique(['institute_id', 'university_id'], 'unique_institute_university');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('institute_university');
    }
};