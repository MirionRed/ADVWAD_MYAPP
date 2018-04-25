<?php

namespace App\Policies;

use App\User;
use App\Division;
use Bouncer;
use Illuminate\Auth\Access\HandlesAuthorization;

class DivisionPolicy
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

    public function view (User $user){
      return $user->can('view-division');
    }

    public function create(User $user){
      return $user->can('create-division');
    }

    public function manage(User $user, Division $division){
      return $user->can('manage-division');
    }
}
