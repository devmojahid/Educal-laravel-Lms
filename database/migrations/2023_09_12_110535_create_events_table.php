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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('location')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_logo')->nullable();
            $table->string('sponsor_website')->nullable();
            $table->string('sponsor_email')->nullable();
            $table->string('sponsor_phone')->nullable();
            $table->string('sponsor_facebook')->nullable();
            $table->string('sponsor_twitter')->nullable();
            $table->string('sponsor_pinterest')->nullable();
            $table->string("ticket_price")->nullable();
            $table->string('ticket_discount_price')->nullable();
            $table->string('speaker_name')->nullable();
            $table->string('speaker_image')->nullable();
            $table->string('speaker_designation')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
