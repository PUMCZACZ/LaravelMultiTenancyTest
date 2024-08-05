<?php

namespace App\Domains\Company\Policies;

use App\Domains\Company\Models\Company;
use App\Domains\User\Models\User;

final class CompanyPolicy
{
    /**
     * Determine when user can see company
     *
     * @param User $user
     * @param Company $company
     * @return bool
     */
    public function view(User $user, Company $company): bool
    {
       return $user->company_id === $company->id;
    }
}
