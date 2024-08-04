<?php

namespace App\Domains\Company\Models;

use App\Domains\Company\Factories\CompanyFactory;
use App\Domains\Tenant\Models\Tenant;
use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property int id
 * @property string name
 * @property Carbon updated_at
 * @property Carbon created_at
 *
 * Relationships
 * @property-read Tenant[] tenants
 */

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    /**
     * Guarder properties in model
     * @var array<int, string>
     */
    protected $guarded = [];

    protected static function newFactory()
    {
        return CompanyFactory::new();
    }

    public function tenants(): HasMany
    {
        return $this->hasMany(Tenant::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
