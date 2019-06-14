<?php

namespace App\Policies;

use App\User;
use App\Testing;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestingPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return optional($user)->type  === 'developer';
    }

}
