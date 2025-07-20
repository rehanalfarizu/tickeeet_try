<?php

namespace App\Console\Commands;

use App\Models\Registration;
use Illuminate\Console\Command;

class ListRegistrations extends Command
{
    protected $signature = 'registration:list {--status=all : Filter by status (pending, approved, rejected, all)}';
    protected $description = 'List all registrations from database';

    public function handle()
    {
        $status = $this->option('status');

        $query = Registration::with('event');

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        $registrations = $query->orderBy('created_at', 'desc')->get();

        if ($registrations->isEmpty()) {
            $this->info("No registrations found" . ($status !== 'all' ? " with status: {$status}" : ""));
            return;
        }

        $this->info("📋 Found " . $registrations->count() . " registration(s)" . ($status !== 'all' ? " with status: {$status}" : ""));
        $this->line("");

        // Tabel header
        $headers = ['ID', 'Name', 'Email', 'Event', 'Institution', 'Status', 'Registered At'];

        $rows = [];
        foreach ($registrations as $registration) {
            $rows[] = [
                $registration->id,
                $registration->first_name . ' ' . $registration->last_name,
                $registration->email,
                $registration->event ? $registration->event->name : 'N/A',
                $registration->institution ?? 'N/A',
                ucfirst($registration->status),
                $registration->created_at ? $registration->created_at->format('Y-m-d H:i') : 'N/A'
            ];
        }

        $this->table($headers, $rows);

        $this->line("");
        $this->info("💡 To send email to specific registration, use:");
        $this->info("   php artisan email:send-real {registration_id} approved");
        $this->info("   php artisan email:send-real {registration_id} rejected");
    }
}
