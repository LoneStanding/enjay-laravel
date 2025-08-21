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
        Schema::create('career_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('referal_name')->nullable();
            $table->string('gender');
            $table->string('name');
            $table->string('nationality');
            $table->string('job_title');
            $table->string('email');
            $table->string('phone');
            $table->string('experience');
            $table->string('current_salary');
            $table->string('expected_salary');
            $table->string('path_to_cv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_submissions');
    }
};
