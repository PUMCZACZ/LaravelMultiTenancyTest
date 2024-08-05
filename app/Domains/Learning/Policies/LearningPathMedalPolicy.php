<?php

namespace App\Domains\Learning\Policies;

use App\Domains\Learning\Models\LearningPathMedal;
use App\Domains\User\Models\User;
use Illuminate\Support\Facades\DB;

final class LearningPathMedalPolicy
{
    /**
     * Determine when user can see learning path medals
     *
     * @param User $user
     * @param LearningPathMedal $learningPathMedal
     * @return bool
     */
    public function view(User $user, LearningPathMedal $learningPathMedal): bool
    {
        return DB::table('user_learning_path_medal')
            ->where('learning_path_medal_id', $learningPathMedal->id)
            ->where('user_id', $user->id)
            ->exists();
    }
}
