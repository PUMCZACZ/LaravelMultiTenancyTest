<?php

namespace App\Domains\Tenant\Controllers;

use App\Domains\User\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TenantController extends Controller
{
    public function index(): View
    {
        $users = User::with(['roles', 'tenant'])->get();

        return view('tenant.index', compact(['users']));
    }
}
