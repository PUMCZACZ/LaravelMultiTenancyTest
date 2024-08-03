<?php

namespace App\Domains\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property string session_name
 * @property Carbon session_date
 */

class AsyncSession extends Model
{
    protected $table = 'aysnc_sessions';

    /**
     * Guarder properties in model
     * @var array<int, string>
     */
    protected $guarded = [];

    protected $casts = [
        'session_date' => Carbon::class,
    ];


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
