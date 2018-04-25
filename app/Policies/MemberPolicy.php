<?php

namespace App\Policies;

use App\User;
use App\Member;
use Bouncer;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
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
      return $user->can('view-member');
    }

    public function create(User $user){
      return $user->can('create-member');
    }

    public function manage(User $user, Member $member){
      return $user->can('manage-member');
    }
}
