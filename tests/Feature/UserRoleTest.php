<?php

namespace Tests\Feature;

use App\Domains\User\Models\User;
use App\Domains\User\Roles\RolesEnum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserRoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_it_can_assign_a_role_to_a_user()
    {
        $user = User::factory()->create();

        $role = Role::create(['name' => RolesEnum::ADMIN->value]);

        $user->assignRole($role);

        // Assert the user has the role
        $this->assertTrue($user->hasRole(RolesEnum::ADMIN->value));
    }

    /**
     * @return void
     */
    public function test_is_user_has_role_user()
    {
        $user = User::factory()->create();

        $role = Role::create(['name' => RolesEnum::USER->value]);

        $user->assignRole($role);

        $this->assertTrue($user->hasRole(RolesEnum::USER->value));
    }
}
