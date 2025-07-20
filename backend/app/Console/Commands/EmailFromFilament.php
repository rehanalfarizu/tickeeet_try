<?php

namespace App\Console\Commands;

use App\Mail\RegistrationApproved;
use App\Mail\RegistrationRejected;
use App\Models\Registration;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EmailFromFilament extends Command
{
    protected $signature = 'email:from-filament {action} {--id=} {--email=}';
    protected $description = 'Send email based on Filament data (approve/reject)';

    public function handle()
    {
        $action = $this->argument('action'); // 'approve' or 'reject'
        $id = $this->option('id');
        $email = $this->option('email');

        try {
            $registration = null;

            // Cari registrasi berdasarkan ID atau email
            if ($id) {
                $registration = Registration::with('event')->find($id);
            } elseif ($email) {
                $registration = Registration::with('event')->where('email', $email)->first();
            } else {
                $this->error("Please provide either --id or --email option");
                return 1;
            }

            if (!$registration) {
                $this->error("Registration not found!");
                return 1;
            }

            // Tampilkan info registrasi
            $this->info("Found Registration:");
            $this->info("ID: {$registration->id}");
            $this->info("Name: {$registration->first_name} {$registration->last_name}");
            $this->info("Email: {$registration->email}");
            $this->info("Institution: {$registration->institution}");

            if ($registration->event) {
                $this->info("Event: {$registration->event->name}");
            } else {
                $this->error("Event data not found!");
                return 1;
            }

            // Konfirmasi sebelum mengirim
            if (!$this->confirm("Send {$action} email to {$registration->email}?")) {
                $this->info("Email sending cancelled.");
                return 0;
            }

            // Update status registrasi
            if ($action === 'approve') {
                $registration->update(['status' => 'approved']);
                Mail::to($registration->email)->send(new RegistrationApproved($registration));
                $this->info("✅ Approval email sent successfully!");
            } elseif ($action === 'reject') {
                $registration->update(['status' => 'rejected']);
                Mail::to($registration->email)->send(new RegistrationRejected($registration));
                $this->info("✅ Rejection email sent successfully!");
            } else {
                $this->error("Invalid action. Use 'approve' or 'reject'");
                return 1;
            }

            $this->info("📬 Email sent to: {$registration->email}");
            $this->info("📊 Registration status updated to: {$registration->status}");

        } catch (\Exception $e) {
            $this->error("❌ Error: " . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
