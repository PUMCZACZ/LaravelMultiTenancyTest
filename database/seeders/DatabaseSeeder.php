<?php

namespace Database\Seeders;

use App\Domains\Company\Models\Company;
use App\Domains\Tenant\Models\Tenant;
use App\Domains\User\Models\User;
use App\Domains\User\Roles\RolesEnum;
use App\Domains\User\Scopes\TenantScope;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        DB::transaction(function () {
            $companies = Company::factory()->count(5)->create();

            $companies->each(function ($company) {
                $tenant = Tenant::factory()
                    ->create([
                        'company_id' => $company->id
                    ]);

                User::factory()
                    ->count(10)
                    ->create([
                        'tenant_id' => $tenant->id,
                        'company_id' => $company->id
                    ])->after(function (User $user) {
                        $user->assignRole(RolesEnum::USER->value);
                    });
            });
        });
    }
}
