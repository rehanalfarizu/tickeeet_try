<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user only if it doesn't exist
        if (!User::where('email', 'rehanalfarizu@gmail.com')->exists()) {
            User::create([
                'name' => 'raihan alfarizi',
                'email' => 'rehanalfarizu@gmail.com',
                'password' => Hash::make('raihanalfarizi'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);
        } else {
            // Update existing user to admin
            User::where('email', 'rehanalfarizu@gmail.com')->update(['is_admin' => true]);
            $this->command->info('Updated existing user to admin');
        }

        // Create additional admin users only if they don't exist
        if (!User::where('email', 'admin@tickeeet.com')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@tickeeet.com',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);
        }

        if (!User::where('email', 'superadmin@tickeeet.com')->exists()) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'superadmin@tickeeet.com',
                'password' => Hash::make('superadmin123'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);
        }

        // Create event manager admin only if it doesn't exist
        if (!User::where('email', 'manager@tickeeet.com')->exists()) {
            User::create([
                'name' => 'Event Manager',
                'email' => 'manager@tickeeet.com',
                'password' => Hash::make('manager123'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);
        }

        $this->command->info('Admin users created/updated successfully!');
        $this->command->info('Admin credentials:');
        $this->command->info('1. rehanalfarizu@gmail.com / raihanalfarizi');
        $this->command->info('2. admin@tickeeet.com / admin123');
        $this->command->info('3. superadmin@tickeeet.com / superadmin123');
        $this->command->info('4. manager@tickeeet.com / manager123');
    }
}
