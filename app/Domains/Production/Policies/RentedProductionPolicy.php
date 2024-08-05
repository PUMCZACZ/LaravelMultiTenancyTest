<?php

namespace App\Domains\Production\Policies;

use App\Domains\Learning\Models\LearningPathMedal;
use App\Domains\MyStoryTrainings\Models\MyStoryTraining;
use App\Domains\Production\Models\Production;
use App\Domains\Production\Models\RentedProduction;
use App\Domains\User\Models\User;

final class RentedProductionPolicy
{
    /**
     * Determine when user can see rented production
     *
     * @param User $user
     * @param RentedProduction $rentedProduction
     * @return bool
     */
    public function view(User $user, RentedProduction $rentedProduction): bool
    {
       return $rentedProduction->user_id === $user->id;
    }
}
