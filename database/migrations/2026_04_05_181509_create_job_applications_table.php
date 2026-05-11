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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_posting_id')->constrained('job_postings')->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('work_email')->nullable();
            $table->string('phone');
            $table->text('experience')->nullable();
            $table->string('highest_education');
            $table->string('university');
            $table->string('linkedin_url')->nullable();
            $table->json('portfolio_urls')->nullable();
            $table->text('cover_note');
            $table->string('resume_path');
            $table->string('status')->default('New');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
