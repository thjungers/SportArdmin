<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Section;
use App\Models\Session;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\VarDumper\VarDumper;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Sections and their Sessions
        $num_sessions = 10;
        $sections = Section::factory()
                            ->count(5)
                            ->sequence(
                                ['name' => 'Badminton', 'is_free' => false],
                                ['name' => 'Jogging',   'is_free' => true ],
                                ['name' => 'Natation',  'is_free' => false],
                                ['name' => 'Yoga',      'is_free' => false],
                                ['name' => 'Vélo',      'is_free' => true ],
                            )
                            ->hasSessions($num_sessions)
                            ->create();

        // Create Users and their Registrations and attach the Users to their Sections
        $users = User::factory(10)
                    ->hasAttached(
                        fake()->randomElements($sections, fake()->numberBetween(1, 4)),
                        ['expires_on' => '2023-08-31']
                    )
                    ->hasRegistrations()
                    ->create();

        // Attach Users to the Sessions corresponding to their Sections
        foreach ($users as $user) {
            foreach ($user->sections as $section) {
                $user->sessions()->attach(
                    $section->sessions->random(fake()->numberBetween(0, $num_sessions))
                );
                // The first session may be free
                $first_session = $user->sessions()->orderBy('starts_at')->first();
                if($first_session !== null)
                {
                    $first_session->pivot->is_free = fake()->boolean();
                    $first_session->pivot->save();
                }
            }
        }
    }
}
