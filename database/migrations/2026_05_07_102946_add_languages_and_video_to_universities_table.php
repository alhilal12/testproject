<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->string('languages')->nullable(); // التركية - الإنجليزية
            $table->string('video_url')->nullable(); // رابط الفيديو التعريفي
        });
    }

    public function down(): void
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->dropColumn(['languages', 'video_url']);
        });
    }
};