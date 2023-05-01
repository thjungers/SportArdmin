<?php

namespace Database\Factories;

use DateTime;
use App\Models\User;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membership>
 */
class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $payed_on = fake()->dateTimeBetween('2022-09-01', '2023-08-31');
        return [
            'amount_paid' => fake()->randomFloat(2, 1, 200),
            'comment' => fake()->boolean() ? fake()->paragraph(1) : null,
            'user_id' => User::factory(),
            'payed_on' => $payed_on,
            'valid_on' => $payed_on,
            'expires_on' => new DateTime('2023-08-31'),
        ];
    }
}
