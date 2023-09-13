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
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropForeign(['course_chapter_id']);
            $table->dropColumn('course_chapter_id');
            $table->unsignedBigInteger('playlist_id')->nullable();
            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropForeign(['playlist_id']);
            $table->dropColumn('playlist_id');
            $table->unsignedBigInteger('course_chapter_id')->nullable();
            $table->foreign('course_chapter_id')->references('id')->on('course_chapters')->onDelete('cascade');
        });
    }
};
