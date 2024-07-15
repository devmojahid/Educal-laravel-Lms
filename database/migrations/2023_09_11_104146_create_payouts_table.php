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
        Schema::create('payouts', function (Blueprint $table) {
            $table->id();
            $table->string('amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('account_number')->nullable();
            $table->string('routing_number')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('bank_passcode')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('transaction_details')->nullable();
            $table->string('transaction_proof')->nullable();
            $table->string(('fees'))->nullable();
            $table->enum('status',['pending','approved','rejected','paid','processing'])->default('pending');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payouts');
    }
};
