<?php

namespace App\Policies;

use App\Models\Film;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilmPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

        return true;
    }

    public function view(User $user, Film $film): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->is_admin ?? false;
    }

    public function update(User $user, Film $film): bool
    {
        return $user->is_admin ?? false;
    }

    public function delete(User $user, Film $film): bool
    {
        return $user->is_admin ?? false;
    }

    public function restore(User $user, Film $film): bool
    {
        return $user->is_admin ?? false;
    }

    public function forceDelete(User $user, Film $film): bool
    {
        return $user->is_admin ?? false;
    }
}
