<?php

namespace App\Domains\Learning\Policies;

use App\Domains\MyStoryTrainings\Models\MyStoryTraining;
use App\Domains\User\Models\User;

final class LearningPathMedalPolicy
{
    /**
     * Determine when user can see learning path medals
     *
     * @param User $user
     * @param MyStoryTraining $myStoryTraining
     * @return bool
     */
    public function view(User $user, MyStoryTraining $myStoryTraining): bool
    {
        return $user->storyTrainings()->contains($myStoryTraining);
    }
}
