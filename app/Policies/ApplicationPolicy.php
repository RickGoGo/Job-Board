<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;
use App\Models\Job;
use Illuminate\Auth\Access\Response;

class ApplicationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool | Response
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Job $job): bool
    {
        // must not be the owner of the job and it doesn't being applied before.
        return $user->id !== $job->employer->user_id && !$job->hasApplied($user->id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Application $application): bool
    {
        return $user->id === $application->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Application $application): bool
    {
        return $user->id === $application->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Application $application): bool
    {
        return $user->id === $application->user_id;
    }
}
