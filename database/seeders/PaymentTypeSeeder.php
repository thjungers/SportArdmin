<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_types')->insert([
            [
                'name' => 'Cotisation',
                'type' => 'membership',
                'amount' => 20,
                'valid_on' => new DateTime('2022-09-01'),
                'expires_on' => new DateTime('2023-06-30'),
                'pt_expires_on' => new DateTime('2023-08-31'),
            ],
            [
                'name' => 'Carte de 10 séances de Badminton',
                'type' => 'card',
                'amount' => 40,
                'number_of_sessions' => 10,
                'valid_on' => new DateTime('2022-09-01'),
                'expires_on' => new DateTime('2023-08-31'),
            ],
            [
                'name' => 'Abonnement de Badminton',
                'type' => 'subscription',
                'amount' => 100,
                'valid_on' => new DateTime('2022-09-01'),
                'expires_on' => new DateTime('2023-06-30'),
                'pt_expires_on' => new DateTime('2023-06-30'),
            ],
            [
                'name' => 'Carte de 5 séances de Yoga',
                'type' => 'card',
                'amount' => 40,
                'number_of_sessions' => 5,
                'valid_on' => new DateTime('2022-09-01'),
                'expires_on' => new DateTime('2023-08-31'),
            ],
        ]);
    }
}
