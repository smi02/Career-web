<?php

namespace App\Policies;

use App\Models\Info;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InfoPolicy
{
    public function edit(User $user, Info $job): bool
    {
        return $job->employer->user->is($user);
    }
}
