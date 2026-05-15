<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('newsletter_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('newsletter_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subscriber_id')->constrained()->cascadeOnDelete();
            $table->string('type'); // open, click, unsubscribe
            $table->string('url')->nullable(); // for click events
            $table->string('ip')->nullable();
            $table->timestamps();

            $table->index(['newsletter_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('newsletter_events');
    }
};
