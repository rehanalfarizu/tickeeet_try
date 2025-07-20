<?php

namespace App\Console\Commands;

use App\Mail\RegistrationApproved;
use App\Models\Registration;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class TestEmail extends Command
{
    protected $signature = 'email:test {email}';
    protected $description = 'Test email functionality';

    public function handle()
    {
        $email = $this->argument('email');

        // Create a dummy registration for testing
        $registration = Registration::make([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => $email,
            'status' => 'approved'
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
            $this->info("Attempting to send email to: {$email}");
            $this->info("Using SMTP host: " . config('mail.mailers.smtp.host'));
            $this->info("Using SMTP port: " . config('mail.mailers.smtp.port'));
            $this->info("Using SMTP username: " . config('mail.mailers.smtp.username'));

            Mail::to($email)->send(new RegistrationApproved($registration));
            $this->info("✓ Test email sent successfully to: {$email}");
        } catch (\Exception $e) {
            $this->error("✗ Failed to send email: " . $e->getMessage());
            $this->error("Full error: " . $e->getTraceAsString());
        }
    }
}
