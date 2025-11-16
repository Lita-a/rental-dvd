<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rental;
use App\Models\User;
use App\Models\Film;

class RentalFactory extends Factory
{
    protected $model = Rental::class;

    public function definition(): array
    {
        $rentedAt = fake()->dateTimeBetween('-1 month', 'now');
        $dueAt = (clone $rentedAt)->modify('+7 days');

        return [
            'user_id' => User::factory(),
            'film_id' => Film::factory(),
            'rented_at' => $rentedAt,
            'due_at' => $dueAt,
            'returned_at' => fake()->boolean(70) ? fake()->dateTimeBetween($rentedAt, 'now') : null,
            'status' => fake()->randomElement(['pending', 'ongoing', 'returned', 'late']),
        ];
    }
}
