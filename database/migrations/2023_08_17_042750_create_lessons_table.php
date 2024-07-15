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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longtext('description')->nullable();
            $table->string('duration')->nullable();
            $table->string('type')->nullable();
            $table->string('video')->nullable();
            $table->string('video_type')->nullable();
            $table->string('video_id')->nullable();
            $table->string('video_thumbnail')->nullable();
            $table->string('video_url')->nullable();
            $table->string('audio')->nullable();
            $table->string('audio_type')->nullable();
            $table->string('ppt')->nullable();
            $table->string('ppt_type')->nullable();
            $table->string('pdf')->nullable();
            $table->string('pdf_type')->nullable();
            $table->string('attachment')->nullable();
            $table->string('visibility')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('sereal')->nullable();
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
