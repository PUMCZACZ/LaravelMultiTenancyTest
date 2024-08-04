<?php

namespace Tests\Feature;

use App\Domains\Company\Models\Company;
use App\Domains\Tenant\Models\Tenant;
use App\Domains\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantScopeTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function test_a_model_has_a_tenant_id(): void
    {
        $company = Company::factory()->create();
        $tenant = Tenant::factory()->create(['company_id' => $company->id]);

        $user = User::factory()->create([
            'tenant_id' => $tenant->id,
            'company_id' => $company->id,
        ]);

        $this->assertDatabaseHas('users', [
            'tenant_id' => $tenant->id,
            'company_id' => $company->id,
        ]);

        $this->assertTrue($user->tenant_id === $tenant->id);
        $this->assertTrue($user->company_id === $company->id);
    }
}
