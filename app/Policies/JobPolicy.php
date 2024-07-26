<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    # Step 6. Policies
    public function edit(User $user, Job $job) :bool
    {
        return $job->employer->user->is($user); // if the user who created the job is the currently signed in user.
    }
}