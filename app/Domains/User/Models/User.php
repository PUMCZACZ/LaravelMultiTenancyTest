<?php

namespace App\Domains\User\Models;

use App\Domains\Chapter\Models\Chapter;
use App\Domains\Company\Models\Company;
use App\Domains\Learning\Models\LearningPathMedal;
use App\Domains\MyStoryTrainings\Models\MyStoryTraining;
use App\Domains\Tenant\Models\Tenant;
use App\Domains\User\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property int id
 * @property string name
 * @property string last_name
 * @property string email
 * @property string password
 *
 * Relationships
 * @property-read|@method MyStoryTraining storyTrainings()
 * @property-read|@method LearningPathMedal learningPathMedals()
 * @property-read|@method AsyncSession asyncSessions()
 * @property-read Company company_id
 * @property-read Tenant tenant_id
 */

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'tenant_id',
        'company_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function booted()
    {
        /*** @var User $authUser */
        $authUser = Auth::user();
        static::addGlobalScope(new TenantScope($authUser));
    }

    public function storyTrainings(): HasMany
    {
        return $this->hasMany(MyStoryTraining::class);
    }

    public function learningPathMedals(): BelongsToMany
    {
        return $this->belongsToMany(LearningPathMedal::class);
    }

    public function asyncSessions(): BelongsToMany
    {
        return $this->belongsToMany(AsyncSession::class);
    }

    public function chapters(): BelongsToMany
    {
        return $this->belongsToMany(Chapter::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function admin()
    {
        $this->assignRole('admin');
    }
}
