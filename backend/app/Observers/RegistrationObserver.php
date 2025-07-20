<?php

namespace App\Observers;

use App\Mail\RegistrationApproved;
use App\Mail\RegistrationRejected;
use App\Models\Registration;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegistrationObserver
{
    /**
     * Handle the Registration "created" event.
     */
    public function created(Registration $registration): void
    {
        //
    }

    /**
     * Handle the Registration "updated" event.
     */
    public function updated(Registration $registration): void
    {
        try {
            // Check if status was changed
            if ($registration->wasChanged('status')) {
                $oldStatus = $registration->getOriginal('status');
                $newStatus = $registration->status;

                // Load the event relationship if not already loaded
                if (!$registration->relationLoaded('event')) {
                    $registration->load('event');
                }

                // Send email if status changed from pending to approved
                if ($oldStatus === 'pending' && $newStatus === 'approved') {
                    Mail::to($registration->email)
                        ->send(new RegistrationApproved($registration));

                    Log::info('Registration approved email sent to: ' . $registration->email);
                }

                // Send email if status changed from pending to rejected
                if ($oldStatus === 'pending' && $newStatus === 'rejected') {
                    Mail::to($registration->email)
                        ->send(new RegistrationRejected($registration));

                    Log::info('Registration rejected email sent to: ' . $registration->email);
                }
            }
        } catch (\Exception $e) {
            Log::error('Error in RegistrationObserver: ' . $e->getMessage());
        }
    }    /**
     * Handle the Registration "deleted" event.
     */
    public function deleted(Registration $registration): void
    {
        //
    }

    /**
     * Handle the Registration "restored" event.
     */
    public function restored(Registration $registration): void
    {
        //
    }

    /**
     * Handle the Registration "force deleted" event.
     */
    public function forceDeleted(Registration $registration): void
    {
        //
    }
}
