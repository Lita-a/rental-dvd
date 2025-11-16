<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Film;
use App\Models\Rental;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FilmTest extends TestCase
{
    use RefreshDatabase;

    public function test_film_user_rental_relationships()
    {

        $user = User::factory()->create();

        $film = Film::factory()->for($user)->create();

        $this->assertTrue($film->user->is($user));

        $rentals = Rental::factory()->count(3)
            ->for($user)
            ->for($film)
            ->create();

        $this->assertCount(3, $user->rentals);
        $this->assertEquals(
            $rentals->pluck('id')->all(),
            $user->rentals->pluck('id')->all()
        );

        foreach ($rentals as $rental) {
            $this->assertTrue($rental->user->is($user));
            $this->assertTrue($rental->film->is($film));
        }
    }
}
