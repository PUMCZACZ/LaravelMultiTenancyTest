<?php

namespace App\Domains\User\Roles;

enum PermissionEnum: string
{
    case TENANT_VIEW = 'tenant view';
    case DASHBOARD_VIEW = 'dashboard view';
}
