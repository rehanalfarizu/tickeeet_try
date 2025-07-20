<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get events and users
        $events = Event::all();
        $users = User::all();

        if ($events->isEmpty() || $users->isEmpty()) {
            $this->command->warn('No events or users found. Please run EventSeeder and AdminSeeder first.');
            return;
        }

        // Create sample teams
        $teams = [
            [
                'name' => 'Code Warriors',
                'description' => 'A team of passionate developers ready to take on any challenge.',
                'event_id' => $events->first()?->id,
                'leader_id' => $users->first()?->id,
                'max_members' => 4,
                'members' => [$users->first()?->id, $users->skip(1)->first()?->id ?? $users->first()?->id],
                'status' => 'open',
            ],
            [
                'name' => 'Tech Innovators',
                'description' => 'Innovation-driven team focused on cutting-edge solutions.',
                'event_id' => $events->first()?->id,
                'leader_id' => $users->skip(1)->first()?->id ?? $users->first()?->id,
                'max_members' => 3,
                'members' => [$users->skip(1)->first()?->id ?? $users->first()?->id],
                'status' => 'open',
            ],
            [
                'name' => 'Data Wizards',
                'description' => 'Specialists in data science and machine learning.',
                'event_id' => $events->skip(1)->first()?->id ?? $events->first()?->id,
                'leader_id' => $users->skip(2)->first()?->id ?? $users->first()?->id,
                'max_members' => 5,
                'members' => [
                    $users->skip(2)->first()?->id ?? $users->first()?->id,
                    $users->skip(3)->first()?->id ?? $users->first()?->id,
                    $users->first()?->id
                ],
                'status' => 'full',
            ],
        ];

        foreach ($teams as $team) {
            // Skip if required data is missing
            if (!$team['event_id'] || !$team['leader_id']) {
                continue;
            }

            // Check if team already exists
            $exists = Team::where('name', $team['name'])
                ->where('event_id', $team['event_id'])
                ->exists();

            if (!$exists) {
                // Filter out null values from members array
                $team['members'] = array_filter($team['members'], fn($id) => !is_null($id));
                Team::create($team);
            }
        }

        $this->command->info('Team sample data created successfully!');
    }
}
