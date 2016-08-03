<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;
use App\Link;

class LinkPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user, Link $link)
    {
        return $user->id == $link->user_id;
    }

    public function edit(User $user, Link $link)
    {
        return $user->id == $link->user_id;
    }
}
