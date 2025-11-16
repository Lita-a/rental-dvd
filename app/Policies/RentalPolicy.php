<?php

namespace App\Policies;

use App\Models\Rental;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RentalPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Rental $rental): bool
    {
        return $user->id === $rental->user_id;
    }
}
