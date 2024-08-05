<?php

namespace App\Domains\Chapter\Policies;

use App\Domains\Chapter\Models\Chapter;
use App\Domains\User\Models\User;

final class ChapterPolicy
{

    /**
     * Determine when user can see chapters
     *
     * @param User $user
     * @param Chapter $chapter
     * @return bool
     */
    public function view(User $user, Chapter $chapter): bool
    {
        return $user->chapters()->where('chapter_id', $chapter->id)->exists();
    }
}
