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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->datetime('registration_deadline');
            $table->integer('max_participants');
            $table->decimal('entry_fee', 12, 2)->default(0);
            $table->enum('event_type', ['hackathon', 'workshop', 'competition', 'seminar'])->default('hackathon');
            $table->json('prizes')->nullable();
            $table->json('requirements')->nullable();
            $table->boolean('is_team_based')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
