<?php

namespace App\Console\Commands;

use App\Mail\RegistrationRejected;
use App\Models\Registration;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class TestEmailRejection extends Command
{
    protected $signature = 'email:test-reject {email}';
    protected $description = 'Test email rejection functionality';

    public function handle()
    {
        $email = $this->argument('email');

        // Create a dummy registration for testing
        $registration = Registration::make([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => $email,
            'status' => 'rejected'
        ]);

        // Set registered_at attribute
        $registration->registered_at = Carbon::now();

        // Create a dummy event
        $registration->setRelation('event', (object)[
            'name' => 'Test Event Registration',
            'description' => 'This is a test event for email functionality testing.',
            'start_date' => Carbon::now()->addDays(7),
            'end_date' => Carbon::now()->addDays(7)->addHours(3),
            'location' => 'Test Location - Amikom University',
            'max_participants' => 100,
            'event_type' => 'workshop',
            'entry_fee' => 50000,
            'is_team_based' => false
        ]);

        try {
            $this->info("Attempting to send Registration Rejected email to: {$email}");
            $this->info("Using Gmail SMTP: " . config('mail.mailers.smtp.host'));

            Mail::to($email)->send(new RegistrationRejected($registration));
            $this->info("✅ Registration Rejected email sent successfully to: {$email}");
            $this->info("📧 Please check your email inbox!");
        } catch (\Exception $e) {
            $this->error("❌ Failed to send rejection email: " . $e->getMessage());
        }
    }
}
