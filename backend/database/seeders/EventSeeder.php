<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'name' => 'Blockchain Hackathon 2025',
                'description' => 'Join us for the biggest blockchain hackathon of the year! Build innovative solutions using cutting-edge blockchain technology. This event will feature workshops on smart contracts, DeFi protocols, and NFT development.',
                'location' => 'Jakarta Convention Center, Indonesia',
                'start_date' => Carbon::now()->addDays(30),
                'end_date' => Carbon::now()->addDays(32),
                'registration_deadline' => Carbon::now()->addDays(15),
                'max_participants' => 200,
                'entry_fee' => 250000,
                'event_type' => 'hackathon',
                'prizes' => [
                    ['position' => '1st Place', 'prize' => '50,000,000 IDR + Internship Opportunity'],
                    ['position' => '2nd Place', 'prize' => '30,000,000 IDR + Mentorship Program'],
                    ['position' => '3rd Place', 'prize' => '15,000,000 IDR + Tech Gadgets'],
                    ['position' => 'Best Innovation', 'prize' => '10,000,000 IDR'],
                    ['position' => 'People\'s Choice', 'prize' => '5,000,000 IDR']
                ],
                'requirements' => [
                    'Basic programming knowledge',
                    'Experience with any blockchain platform',
                    'Laptop with development environment',
                    'Willingness to work in teams'
                ],
                'is_team_based' => true,
                'is_active' => true,
            ],
            [
                'name' => 'AI/ML Workshop Series',
                'description' => 'Comprehensive workshop series covering machine learning fundamentals, deep learning, and practical AI applications. Perfect for beginners and intermediate developers.',
                'location' => 'Universitas Indonesia, Depok',
                'start_date' => Carbon::now()->addDays(20),
                'end_date' => Carbon::now()->addDays(22),
                'registration_deadline' => Carbon::now()->addDays(10),
                'max_participants' => 100,
                'entry_fee' => 150000,
                'event_type' => 'workshop',
                'prizes' => [
                    ['position' => 'Best Project', 'prize' => 'AI Development Kit'],
                    ['position' => 'Most Creative', 'prize' => 'Online Course Bundle']
                ],
                'requirements' => [
                    'Basic Python knowledge',
                    'Statistics fundamentals',
                    'Laptop with Python installed'
                ],
                'is_team_based' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Web Development Competition',
                'description' => 'Show off your web development skills in this exciting competition. Build a complete web application within 48 hours using modern frameworks and technologies.',
                'location' => 'Online Event',
                'start_date' => Carbon::now()->addDays(25),
                'end_date' => Carbon::now()->addDays(27),
                'registration_deadline' => Carbon::now()->addDays(12),
                'max_participants' => 150,
                'entry_fee' => 0, // Free event
                'event_type' => 'competition',
                'prizes' => [
                    ['position' => '1st Place', 'prize' => '20,000,000 IDR + Developer Tools'],
                    ['position' => '2nd Place', 'prize' => '10,000,000 IDR + Online Courses'],
                    ['position' => '3rd Place', 'prize' => '5,000,000 IDR + Tech Books']
                ],
                'requirements' => [
                    'HTML, CSS, JavaScript knowledge',
                    'Experience with at least one web framework',
                    'Git/GitHub account'
                ],
                'is_team_based' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Data Science Seminar',
                'description' => 'Learn about the latest trends in data science and analytics. Industry experts will share insights on big data, data visualization, and business intelligence.',
                'location' => 'Bandung Institute of Technology',
                'start_date' => Carbon::now()->addDays(15),
                'end_date' => Carbon::now()->addDays(15),
                'registration_deadline' => Carbon::now()->addDays(7),
                'max_participants' => 300,
                'entry_fee' => 75000,
                'event_type' => 'seminar',
                'prizes' => [],
                'requirements' => [
                    'Interest in data science',
                    'Basic statistics knowledge helpful but not required'
                ],
                'is_team_based' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Mobile App Development Bootcamp',
                'description' => 'Intensive bootcamp covering iOS and Android development. Learn to build native mobile applications from scratch using modern development tools.',
                'location' => 'Surabaya Tech Hub',
                'start_date' => Carbon::now()->addDays(40),
                'end_date' => Carbon::now()->addDays(45),
                'registration_deadline' => Carbon::now()->addDays(20),
                'max_participants' => 80,
                'entry_fee' => 500000,
                'event_type' => 'workshop',
                'prizes' => [
                    ['position' => 'Best App', 'prize' => 'Mobile Development Kit + Mentorship'],
                    ['position' => 'Most Innovative', 'prize' => 'Premium Development Tools']
                ],
                'requirements' => [
                    'Programming experience (any language)',
                    'Laptop with development tools',
                    'Mobile device for testing'
                ],
                'is_team_based' => false,
                'is_active' => true,
            ]
        ];

        foreach ($events as $eventData) {
            Event::create($eventData);
        }
    }
}
