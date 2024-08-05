<?php

namespace App\Domains\Tenant\Policies;

use App\Domains\Learning\Models\LearningPathMedal;
use App\Domains\MyStoryTrainings\Models\MyStoryTraining;
use App\Domains\Production\Models\Production;
use App\Domains\Tenant\Models\Tenant;
use App\Domains\User\Models\User;
use App\Domains\User\Roles\RolesEnum;
use function Symfony\Component\Translation\t;

final class TenantPolicy
{
    /**
     * Determine when user can see tenant index
     *
     * @param User $user
     * @return bool
     */
    public function view(User $user): bool
    {
        if (!$user->hasRole(RolesEnum::ADMIN->value)) {
            return false;
        }

        return true;
    }

    /**
     * Determine when user can see specific tenant
     *
     * @param User $user
     * @param Tenant $tenant
     * @return bool
     */
    public function show(User $user, Tenant $tenant)
    {
        return $user->tenant_id === $tenant->id;
    }
}
