<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('university_quotas', function (Blueprint $table) {
            $table->string('institute')->nullable()->after('university_name_ar');
        });
        
        Schema::table('postgraduate_quotas', function (Blueprint $table) {
            $table->string('institute')->nullable()->after('university_name_ar');
        });
    }

    public function down()
    {
        Schema::table('university_quotas', function (Blueprint $table) {
            $table->dropColumn('institute');
        });
        
        Schema::table('postgraduate_quotas', function (Blueprint $table) {
            $table->dropColumn('institute');
        });
    }
};