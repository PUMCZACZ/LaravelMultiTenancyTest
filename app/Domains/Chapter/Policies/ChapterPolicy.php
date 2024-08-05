<?php

namespace App\Domains\Chapter\Policies;

use App\Domains\Chapter\Models\Chapter;
use App\Domains\User\Models\User;
use Illuminate\Support\Facades\DB;

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
        return DB::table('user_chapter')
            ->where('chapter_id', $chapter->id)
            ->where('user_id', $user->id)
            ->exists();
    }
}
