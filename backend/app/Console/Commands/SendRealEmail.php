<?php

namespace App\Console\Commands;

use App\Mail\RegistrationApproved;
use App\Mail\RegistrationRejected;
use App\Models\Registration;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendRealEmail extends Command
{
    protected $signature = 'email:send-real {registration_id} {type=approved}';
    protected $description = 'Send email based on real registration data from database';

    public function handle()
    {
        $registrationId = $this->argument('registration_id');
        $type = $this->argument('type');

        try {
            // Ambil data registrasi yang sesungguhnya dari database
            $registration = Registration::with('event')->find($registrationId);

            if (!$registration) {
                $this->error("❌ Registration with ID {$registrationId} not found!");
                return 1;
            }

            if (!$registration->event) {
                $this->error("❌ Event data not found for registration ID {$registrationId}!");
                return 1;
            }

            $this->info("📋 Registration found:");
            $this->info("   Name: {$registration->first_name} {$registration->last_name}");
            $this->info("   Email: {$registration->email}");
            $this->info("   Event: {$registration->event->name}");
            $this->info("   Institution: {$registration->institution}");
            $this->info("   Status: {$registration->status}");
            $this->line("");

            $this->info("🚀 Sending {$type} email to: {$registration->email}");
            $this->info("📡 SMTP: " . config('mail.mailers.smtp.host'));

            // Kirim email sesuai dengan type
            if ($type === 'rejected') {
                Mail::to($registration->email)->send(new RegistrationRejected($registration));
                $this->info("✅ Registration Rejected email sent successfully!");
            } else {
                Mail::to($registration->email)->send(new RegistrationApproved($registration));
                $this->info("✅ Registration Approved email sent successfully!");
            }

            $this->info("📬 Email sent to {$registration->email}");

        } catch (\Exception $e) {
            $this->error("❌ Failed to send email: " . $e->getMessage());
            $this->error("🔍 Error details: " . $e->getFile() . ':' . $e->getLine());
            return 1;
        }

        return 0;
    }
}
