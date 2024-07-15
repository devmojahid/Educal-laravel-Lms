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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // user_id
            $table->unsignedBigInteger('blog_id'); // post_id
            $table->longText('content'); // content
            $table->unsignedBigInteger('parent_id')->nullable(); // parent_id
            $table->enum('status', ['approved', 'pending', 'rejected']); // status (approved, pending, rejected
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('blog_id')->references('id')->on('blogs')->cascadeOnDelete();
            $table->foreign('parent_id')->references('id')->on('comments')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
