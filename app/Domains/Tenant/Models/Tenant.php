<?php

namespace App\Domains\Tenant\Models;

use App\Domains\Company\Models\Company;
use App\Domains\Tenant\Factories\TenantFactory;
use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property string name
 * @property Carbon updated_at
 * @property Carbon created_at
 *
 * @property-read Company company_id
 */

class Tenant extends Model
{
    use HasFactory;

    protected $table = 'tenants';

    /**
     * Guarder properties in model
     * @var array<int, string>
     */
    protected $guarded = [];

    protected static function newFactory(): TenantFactory
    {
        return TenantFactory::new();
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
