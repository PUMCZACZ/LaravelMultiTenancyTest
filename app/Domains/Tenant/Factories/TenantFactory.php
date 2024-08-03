<?php

namespace App\Domains\Tenant\Factories;

use App\Domains\Company\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'company_id' => self::factoryForModel(CompanyFactory::class),
        ];
    }
}
