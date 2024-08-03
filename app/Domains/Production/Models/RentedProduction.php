<?php

namespace App\Domains\Production\Models;

use App\Domains\User\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property Carbon rental_date
 *
 * Relationships
 * @property-read User user
 */
class RentedProduction extends Model
{
    protected $table = 'rented_productions';

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
