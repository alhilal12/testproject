<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('colleges', function (Blueprint $table) {
    $table->dropForeign(['university_id']);
    $table->dropColumn('university_id');
});

Schema::table('institutes', function (Blueprint $table) {
    $table->dropForeign(['university_id']);
    $table->dropColumn('university_id');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('colleges_and_institutes', function (Blueprint $table) {
            //
        });
    }
};
