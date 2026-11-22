<?php

namespace App\Policies;

use App\Models\Aprendiz;
use App\Models\User;

class AprendizPolicy
{
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['instructor', 'aprendiz'], true);
    }

    public function view(User $user, Aprendiz $aprendiz): bool
    {
        return in_array($user->role, ['instructor', 'aprendiz'], true);
    }

    public function create(User $user): bool
    {
        return $user->isInstructor();
    }

    public function update(User $user, Aprendiz $aprendiz): bool
    {
        return $user->isInstructor();
    }

    public function delete(User $user, Aprendiz $aprendiz): bool
    {
        return false;
    }
}
