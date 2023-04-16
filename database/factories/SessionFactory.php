<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Session>
 */
class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('2022-09-01', '2023-08-31');
        return [
            'section_id' => Section::factory(),
            'starts_at' => $start,
            'ends_at' => fake()->dateTimeInInterval($start, '+4 hours'),
        ];
    }
}
