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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->longText('svg')->nullable();
            $table->string('video')->nullable();
            $table->string("video_thumbnail")->nullable();
            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('duration')->nullable();
            $table->string('duration_type')->nullable();
            $table->enum('type',['free','paid'])->default('free');
            $table->enum('level',['beginner','intermediate','advanced'])->default('beginner');
            $table->string('requirements')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->enum('status',['draft','approved','pending','rejected'])->default('pending');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('course_categories')->cascadeOnDelete();
            $table->foreign('subcategory_id')->references('id')->on('course_sub_categories')->cascadeOnDelete();
            $table->foreign('tag_id')->references('id')->on('course_tags')->cascadeOnDelete();
            $table->foreign('language_id')->references('id')->on('course_languages')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
