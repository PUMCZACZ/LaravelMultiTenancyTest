<?php

namespace App\Domains\MyStoryTrainings\Models;

use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property int user_id
 * @property \DateTime training_date
 *
 * @property-read User user
 */
class MyStoryTraining extends Model
{
    protected $table = 'productions';
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
