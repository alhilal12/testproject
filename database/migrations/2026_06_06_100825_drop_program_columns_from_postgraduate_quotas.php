<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('postgraduate_quotas', function (Blueprint $table) {
            $table->dropColumn(['program_level', 'program_name']);
        });
    }

    public function down()
    {
        Schema::table('postgraduate_quotas', function (Blueprint $table) {
            $table->string('program_level')->nullable();
            $table->string('program_name')->nullable();
        });
    }
};