<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('universities', function (Blueprint $table) {
            // إضافة عمود جديد دون حذف القديم
            if (!Schema::hasColumn('universities', 'languages_json')) {
                $table->json('languages_json')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->dropColumn('languages_json');
        });
    }
};