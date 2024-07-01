<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Info;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class InfoPolicy
{
    public function edit(User $user, Info $job): bool
    {
        if ($user->admin) {
            return true;
        }
        return $job->user->is($user);
    }

}
