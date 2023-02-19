<?php

namespace App\Enums;

enum UserType: int
{
    case SUPERADMIN = 1;
    case ADMIN = 2;
    case MANAGER = 3;
    case CUSTOMER = 4;

    public function isSuperAdmin(): bool
    {
        return $this === self::SUPERADMIN;
    }

    public function isAdmin(): bool
    {
        return $this === self::ADMIN;
    }

    public function isManager(): bool
    {
        return $this === self::MANAGER;
    }

    public function isCustomer(): bool
    {
        return $this === self::CUSTOMER;
    }
}
