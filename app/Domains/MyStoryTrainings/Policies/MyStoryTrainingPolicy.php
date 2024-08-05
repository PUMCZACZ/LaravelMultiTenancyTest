<?php

namespace App\Domains\MyStoryTrainings\Policies;

use App\Domains\Learning\Models\LearningPathMedal;
use App\Domains\MyStoryTrainings\Models\MyStoryTraining;
use App\Domains\User\Models\User;

final class MyStoryTrainingPolicy
{
    /**
     * Determine when user can see my story trainings
     *
     * @param User $user
     * @param MyStoryTraining $myStoryTraining
     * @return bool
     */
    public function view(User $user, MyStoryTraining $myStoryTraining): bool
    {
        return $myStoryTraining->user_id === $user->id;
    }
}
