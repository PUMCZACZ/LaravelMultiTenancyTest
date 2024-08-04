<?php

namespace Database\Seeders;

use App\Domains\User\Roles\PermissionEnum;
use App\Domains\User\Roles\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => PermissionEnum::TENANT_VIEW->value]);
        Permission::create(['name' => PermissionEnum::DASHBOARD_VIEW->value]);

        Role::create(['name' => RolesEnum::ADMIN->value])
            ->givePermissionTo([
                PermissionEnum::DASHBOARD_VIEW->value,
                PermissionEnum::TENANT_VIEW->value
            ]);


        Role::create(['name' => RolesEnum::USER->value])->givePermissionTo([
            PermissionEnum::DASHBOARD_VIEW->value
        ]);
    }
}
