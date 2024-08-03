<?php

namespace App\Domains\User\Roles;

enum RolesEnum: string
{
    case ADMIN = 'admin';
    case USER = 'user';
}
