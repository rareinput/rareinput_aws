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
        Schema::create('sequence_sends', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscriber_sequence_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sequence_email_id')->constrained()->cascadeOnDelete();
            $table->timestamp('sent_at');
            $table->timestamps();

            $table->unique(['subscriber_sequence_id', 'sequence_email_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sequence_sends');
    }
};
