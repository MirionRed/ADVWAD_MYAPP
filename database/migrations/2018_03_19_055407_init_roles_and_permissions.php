<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class InitRolesAndPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = Bouncer::role()->create([
          'name' => 'admin',
          'title' => 'Administrator',
        ]);

        $manager = Bouncer::role()->create([
          'name' => 'manager',
          'title' => 'Manager',
        ]);

        $staff = Bouncer::role()->create([
          'name' => 'staff',
          'title' => 'Staff',
        ]);

        // Define abilities
        $viewMember = Bouncer::ability()->create([
          'name' => 'view-member',
          'title' => 'View Member',
        ]);

        $createMember = Bouncer::ability()->create([
          'name' => 'create-member',
          'title' => 'Create Member',
        ]);

        $manageMember = Bouncer::ability()->create([
          'name' => 'manage-member',
          'title' => 'Manage Member',
        ]);

        $viewDivision = Bouncer::ability()->create([
          'name' => 'view-division',
          'title' => 'View Division',
        ]);

        $createDivision = Bouncer::ability()->create([
          'name' => 'create-division',
          'title' => 'Create Division',
        ]);

        $manageDivision = Bouncer::ability()->create([
          'name' => 'manage-division',
          'title' => 'Manage Division',
        ]);

        $viewGroup = Bouncer::ability()->create([
          'name' => 'view-group',
          'title' => 'View Group',
        ]);

        $createGroup = Bouncer::ability()->create([
          'name' => 'create-group',
          'title' => 'Create Group',
        ]);

        $manageGroup = Bouncer::ability()->create([
          'name' => 'manage-group',
          'title' => 'Manage Group',
        ]);

        // Assign abilities to roles
        Bouncer::allow($staff)->to($viewMember);
        Bouncer::allow($staff)->to($createMember);
        Bouncer::allow($staff)->to($manageMember);
        Bouncer::allow($staff)->to($viewDivision);
        Bouncer::allow($staff)->to($viewGroup);

        Bouncer::allow($manager)->to($viewMember);
        Bouncer::allow($manager)->to($createMember);
        Bouncer::allow($manager)->to($manageMember);
        Bouncer::allow($manager)->to($viewDivision);
        Bouncer::allow($manager)->to($createDivision);
        Bouncer::allow($manager)->to($manageDivision);
        Bouncer::allow($manager)->to($viewGroup);
        Bouncer::allow($manager)->to($createGroup);
        Bouncer::allow($manager)->to($manageGroup);

        Bouncer::allow($admin)->to($viewMember);
        Bouncer::allow($admin)->to($createMember);
        Bouncer::allow($admin)->to($manageMember);
        Bouncer::allow($admin)->to($viewDivision);
        Bouncer::allow($admin)->to($createDivision);

        Bouncer::allow($admin)->to($manageDivision);
        Bouncer::allow($admin)->to($viewGroup);
        Bouncer::allow($admin)->to($createGroup);
        Bouncer::allow($admin)->to($manageGroup);

        // Make the first user an admin
        $user = User::find(1);
        Bouncer::assign('admin')->to($user);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
