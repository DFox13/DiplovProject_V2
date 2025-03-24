<?php

namespace App\Enums;

enum Roles: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case SYSTEM_ADMIN = 'system_admin';
}