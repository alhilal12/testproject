<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('college_university', function (Blueprint $table) {
            $table->decimal('fee', 12, 2)->nullable()->after('university_id');
        });

        Schema::table('institute_university', function (Blueprint $table) {
            $table->decimal('fee', 12, 2)->nullable()->after('university_id');
        });
    }

    public function down(): void
    {
        Schema::table('college_university', function (Blueprint $table) {
            $table->dropColumn('fee');
        });

        Schema::table('institute_university', function (Blueprint $table) {
            $table->dropColumn('fee');
        });
    }
};