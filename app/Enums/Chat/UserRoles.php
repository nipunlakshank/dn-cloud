<?php

namespace App\Enums\Chat;

enum UserRoles: string
{
    case Owner = 'owner';
    case Admin = 'admin';
    case Member = 'member';
}
