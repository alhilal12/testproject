<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('college_university')) {
            Schema::create('college_university', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('college_id');
                $table->unsignedBigInteger('university_id');
                $table->timestamps();
                
                $table->foreign('college_id')->references('id')->on('colleges');
                $table->foreign('university_id')->references('id')->on('universities');
                
                $table->unique(['college_id', 'university_id'], 'college_university_college_id_university_id_unique');
                $table->unique(['college_id', 'university_id'], 'unique_college_university');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('college_university');
    }
};