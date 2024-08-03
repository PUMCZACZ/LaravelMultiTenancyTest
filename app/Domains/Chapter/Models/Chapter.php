<?php

namespace App\Domains\Chapter\Models;

use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int id
 * @property string title
 * @property string description
 *
 * Relationships
 * @property-read User[] $users
 */
class Chapter extends Model
{
    protected $table = 'chapters';

    protected $guarded = [];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
