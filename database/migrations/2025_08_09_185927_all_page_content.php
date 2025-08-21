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
        Schema::create('all_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page_name'); // e.g. 'about', 'contact', 'home'
            $table->string('section_name')->nullable(); // e.g. 'hero', 'footer', 'sidebar'
            $table->string('title')->nullable(); // optional title
            $table->text('content')->nullable(); // main content
            $table->string('media_path')->nullable(); // image/video path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_page_contents');
    }
};
