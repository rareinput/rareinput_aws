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
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('department');
            $table->enum('type', ['Full-time', 'Part-time', 'Freelance', 'Contract', 'Internship']);
            $table->string('location');
            $table->enum('experience', ['Fresher (0–1 yrs)', 'Junior (1–3 yrs)', 'Mid-level (3–5 yrs)', 'Senior (5+ yrs)', 'Any']);
            $table->text('description');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};
