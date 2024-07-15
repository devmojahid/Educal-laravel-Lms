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
        Schema::create('book_genre', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained("books")->onDelete('cascade');
            $table->foreignId('genre_id')->constrained("book_genres")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_genre', function (Blueprint $table) {
            $table->dropForeign(['book_id']);
            $table->dropForeign(['genre_id']);
            $table->dropIfExists();
        });
    }
};