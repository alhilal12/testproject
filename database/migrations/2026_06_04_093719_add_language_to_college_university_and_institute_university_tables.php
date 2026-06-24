<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('college_university', function (Blueprint $table) {
            $table->string('language', 100)->nullable()->after('fee');
        });

        Schema::table('institute_university', function (Blueprint $table) {
            $table->string('language', 100)->nullable()->after('fee');
        });
    }

    public function down(): void
    {
        Schema::table('college_university', function (Blueprint $table) {
            $table->dropColumn('language');
        });

        Schema::table('institute_university', function (Blueprint $table) {
            $table->dropColumn('language');
        });
    }
};