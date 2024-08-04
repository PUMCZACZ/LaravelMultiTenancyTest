<?php

namespace App\Domains\User\Scopes;

use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

readonly class TenantScope implements Scope
{

    public function __construct(private ?User $user)
    {
    }
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (!$this->user) {
            return;
        }

        $builder->where('tenant_id', $this->user->tenant_id);
    }
}
