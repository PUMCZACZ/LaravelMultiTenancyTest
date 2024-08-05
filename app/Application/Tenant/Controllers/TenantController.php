<?php

namespace App\Application\Tenant\Controllers;

use App\Domains\Tenant\Models\Tenant;
use App\Domains\User\Models\User;
use App\Domains\User\Roles\RolesEnum;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TenantController extends Controller
{
    use AuthorizesRequests;
    public function index(): View
    {
        $this->authorize('view',Tenant::class);

        $users = User::with(['roles', 'tenant'])->get();


        return view('tenant.index', compact(['users']));
    }

    public function switchRole(User $user): RedirectResponse
    {
        match ($user->hasRole(RolesEnum::ADMIN->value)) {
            true => $user->syncRoles(RolesEnum::USER->value),
            false => $user->syncRoles(RolesEnum::ADMIN->value),
        };

        return redirect()->back();
    }
}
