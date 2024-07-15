<?php

use App\Constants\Status;
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
        Schema::create('book_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText("description")->nullable();
            $table->string("image")->nullable();
            $table->longText("svg")->nullable();
            $table->string("icon")->nullable();
            $table->string("meta_title")->nullable();
            $table->longText("meta_description")->nullable();
            $table->string("meta_keywords")->nullable();
            $table->enum("status", [Status::ACTIVE, Status::INACTIVE])->default(Status::ACTIVE);
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
        Schema::table('book_categories', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropIfExists();
        });
    }
};