<?php

namespace App\Policies;

use App\User;
use App\Group;
use Bouncer;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
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

    public function view(User $user){
      return $user->can('view-group');
    }

    public function create(User $user){
      return $user->can('create-group');
    }

    public function manage(User $user, Group $group){
      return $user->can('manage-group');
    }
}
