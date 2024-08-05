<?php

namespace App\Domains\Production\Policies;

use App\Domains\Learning\Models\LearningPathMedal;
use App\Domains\MyStoryTrainings\Models\MyStoryTraining;
use App\Domains\Production\Models\Production;
use App\Domains\User\Models\User;

final class ProductionPolicy
{
    /**
     * Determine when user can see productions
     *
     * @param User $user
     * @param Production $production
     * @return bool
     */
    public function view(User $user, Production $production): bool
    {
       return $user->productions()->where('production_id', $production->id)->exists();
    }
}
