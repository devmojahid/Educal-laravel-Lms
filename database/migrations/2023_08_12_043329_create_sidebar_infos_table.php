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
        Schema::create('sidebar_infos', function (Blueprint $table) {
            $table->id();
            $table->enum('search', ['on', 'off'])->default('on');
            $table->enum('category', ['on', 'off'])->default('on');
            $table->enum('tag', ['on', 'off'])->default('on');
            $table->enum('recent_post', ['on', 'off'])->default('on');
            $table->enum('popular_post', ['on', 'off'])->default('off');
            $table->enum('recent_comment', ['on', 'off'])->default('off');
            $table->enum('archives', ['on', 'off'])->default('off');
            $table->enum('banner', ['on', 'off'])->default('on');
            $table->string("category_title")->default("Category")->nullable();
            $table->string("category_count")->nullable();
            $table->string("tag_title")->default("Tags")->nullable();
            $table->string("tag_count")->nullable();
            $table->string("recent_post_title")->default("Recent posts")->nullable();
            $table->string("recent_post_count")->nullable();
            $table->string("popular_post_title")->default("Populer posts")->nullable();
            $table->string("popular_post_count")->nullable();
            $table->string("recent_comment_title")->default("Recent Comment")->nullable();
            $table->string("recent_comment_count")->nullable();
            $table->string("banner_title")->nullable();
            $table->string("banner_image")->nullable();
            $table->string("banner_link")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sidebar_infos');
    }
};
