<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('university_id')->constrained()->onDelete('cascade');
            $table->foreignId('major_id')->constrained()->onDelete('cascade');
            $table->enum('education_level', ['bachelor', 'master', 'phd'])->default('bachelor');
            $table->enum('study_language', ['turkish', 'english', 'arabic'])->default('turkish');
            $table->text('message')->nullable();
            $table->string('attachment')->nullable();
            $table->enum('status', ['pending', 'processing', 'replied', 'completed'])->default('pending');
            $table->text('admin_reply')->nullable();
            $table->timestamps();
             $table->foreignId('replied_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('replied_at')->nullable();
            if (Schema::hasColumn('consultations', 'user_id')) {
                $table->renameColumn('user_id', 'student_id');
            }
        });
    }
 public function down(): void
    {
        Schema::table('consultations', function (Blueprint $table) {
             $table->dropForeign(['replied_by']);
            $table->dropColumn(['replied_by', 'replied_at']);
            if (Schema::hasColumn('consultations', 'student_id')) {
                $table->renameColumn('student_id', 'user_id');
            }
        });
    }
};
   