<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get events
        $events = Event::all();

        if ($events->isEmpty()) {
            $this->command->warn('No events found. Please run EventSeeder first.');
            return;
        }

        // Create sample registrations
        $registrations = [
            [
                'event_id' => $events->first()->id,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '081234567890',
                'institution' => 'Universitas Indonesia',
                'major' => 'Computer Science',
                'motivation' => 'I want to learn blockchain technology and build innovative solutions.',
                'experience' => 'I have 2 years of experience in web development using React and Node.js.',
                'skills' => ['JavaScript', 'React', 'Node.js', 'Python'],
                'preferences' => ['team_size' => '3-4 people', 'role' => 'Full-stack Developer'],
                'status' => 'approved',
                'registered_at' => Carbon::now()->subDays(5),
            ],
            [
                'event_id' => $events->first()->id,
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '081234567891',
                'institution' => 'Institut Teknologi Bandung',
                'major' => 'Informatics Engineering',
                'motivation' => 'I am passionate about AI and machine learning applications.',
                'experience' => 'I have experience with Python, TensorFlow, and data analysis.',
                'skills' => ['Python', 'TensorFlow', 'Data Analysis', 'Machine Learning'],
                'preferences' => ['team_size' => '2-3 people', 'role' => 'Data Scientist'],
                'status' => 'pending',
                'registered_at' => Carbon::now()->subDays(3),
            ],
            [
                'event_id' => $events->skip(1)->first()->id ?? $events->first()->id,
                'first_name' => 'Alice',
                'last_name' => 'Johnson',
                'email' => 'alice.johnson@example.com',
                'phone' => '081234567892',
                'institution' => 'Universitas Gadjah Mada',
                'major' => 'Software Engineering',
                'motivation' => 'I want to improve my web development skills and learn new frameworks.',
                'experience' => 'I have experience with HTML, CSS, JavaScript, and Vue.js.',
                'skills' => ['HTML', 'CSS', 'JavaScript', 'Vue.js', 'PHP'],
                'preferences' => ['framework' => 'Vue.js', 'backend' => 'Laravel'],
                'status' => 'approved',
                'registered_at' => Carbon::now()->subDays(2),
            ],
            [
                'event_id' => $events->skip(2)->first()->id ?? $events->first()->id,
                'first_name' => 'Bob',
                'last_name' => 'Wilson',
                'email' => 'bob.wilson@example.com',
                'phone' => '081234567893',
                'institution' => 'Universitas Bina Nusantara',
                'major' => 'Computer Science',
                'motivation' => 'I want to learn about data science and analytics.',
                'experience' => 'I have basic knowledge of statistics and Python programming.',
                'skills' => ['Python', 'Statistics', 'Excel', 'SQL'],
                'preferences' => ['focus' => 'Data Visualization', 'tools' => 'Python & R'],
                'status' => 'rejected',
                'registered_at' => Carbon::now()->subDays(1),
            ],
        ];

        foreach ($registrations as $registration) {
            // Check if registration already exists
            $exists = Registration::where('email', $registration['email'])
                ->where('event_id', $registration['event_id'])
                ->exists();

            if (!$exists) {
                Registration::create($registration);
            }
        }

        $this->command->info('Registration sample data created successfully!');
    }
}
