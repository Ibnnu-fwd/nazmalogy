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
            $table->foreignId('course_category_id')->constrained('course_categories')->nullable()->default(null);
            $table->string('name');
            $table->string('thumbnail')->nullable()->default(null);
            $table->integer('price');
            $table->longText('description');
            $table->string('language');
            $table->string('level');
            $table->string('phone');
            $table->boolean('is_active')->default(true);
            $table->boolean('publish_status')->default(false);
            $table->foreignId('author_id')->constrained('users');
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
