<?php

namespace App\Domains\Learning\Models;

use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * @property int id
 * @property string medal_name
 * @property string description
 *
 * @property-read Collection users
 */
class LearningPathMedal extends Model
{
    protected $table = 'learning_path_medals';
    protected $guarded = [];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
