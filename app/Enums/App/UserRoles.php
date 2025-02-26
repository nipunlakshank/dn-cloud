<?php

namespace App\Enums\App;

enum UserRoles: string
{
    case SuperAdmin = 'super_admin';
    case Admin = 'admin';
    case Accountant = 'accountant';
    case Worker = 'worker';
    case Developer = 'developer';
}
