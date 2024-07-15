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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longtext('description')->nullable();
            $table->string("quiz_type")->nullable();
            $table->string("quiz_time")->nullable();
            $table->string("quiz_duration")->nullable();
            $table->string("quiz_status")->nullable();
            $table->string("marks_per_question")->nullable();
            $table->string("quiz_passing_marks")->nullable();
            $table->string("quiz_certificate")->nullable();
            $table->string("quiz_show_marks")->nullable();
            $table->string("quiz_show_passed")->nullable();
            $table->string("quiz_show_rank")->nullable();
            $table->string("quiz_show_percentage")->nullable();
            $table->string("quiz_show_time")->nullable();
            $table->unsignedBigInteger('sereal')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
