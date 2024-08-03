<?php

namespace App\Domains\Production\Models;

use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * @property int id
 * @property string title
 * @property string genre
 *
 * Relationships
 * @property-read|@method Collection users
 */
class Production extends Model
{
    protected $table = 'productions';

    protected $guarded = [];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
