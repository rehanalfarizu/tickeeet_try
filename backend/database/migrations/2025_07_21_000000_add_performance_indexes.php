<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            // Add indexes for commonly searched/filtered columns
            $table->index(['status', 'created_at']);
            $table->index(['event_id', 'status']);
            $table->index(['email']);
            $table->index(['first_name', 'last_name']);
        });

        Schema::table('events', function (Blueprint $table) {
            // Use is_active instead of status for events table
            $table->index(['is_active', 'start_date']);
            $table->index(['registration_deadline', 'is_active']);
            $table->index(['event_type', 'is_active']);
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->index(['event_id', 'status']);
            $table->index(['leader_id', 'status']);
        });
    }

    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropIndex(['status', 'created_at']);
            $table->dropIndex(['event_id', 'status']);
            $table->dropIndex(['email']);
            $table->dropIndex(['first_name', 'last_name']);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropIndex(['is_active', 'start_date']);
            $table->dropIndex(['registration_deadline', 'is_active']);
            $table->dropIndex(['event_type', 'is_active']);
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->dropIndex(['event_id', 'status']);
            $table->dropIndex(['leader_id', 'status']);
        });
    }
};
