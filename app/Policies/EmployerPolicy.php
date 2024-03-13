<?php

namespace App\Policies;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployerPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool | Response
    {
        if (null !== $user->employer)
            return Response::deny('you already an employer');
        return true;
    }
}
