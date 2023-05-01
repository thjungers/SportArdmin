<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $payed_on = fake()->dateTimeBetween('2022-09-01', '2023-08-31');
        $num_sessions = fake()->numberBetween(1, 12);
        return [
            'amount_paid' => fake()->randomFloat(2, 1, 200),
            'comment' => fake()->boolean() ? fake()->paragraph(1) : null,
            'user_id' => User::factory(),
            'payed_on' => $payed_on,
            'valid_on' => $payed_on,
            'section_id' => Section::factory(),
            'number_of_sessions' => $num_sessions,
            'remaining_sessions' => $num_sessions,
        ];
    }
}
