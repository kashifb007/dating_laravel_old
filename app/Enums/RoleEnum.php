<?php

/**
 * Enum RoleEnum
 * Author: Kashif Bhatti
 * 04/08/2025
 */

namespace App\Enums;

enum RoleEnum: string
{
    case SUPER_ADMIN = 'super-admin';
    case OWNER = 'owner';
    case ADMIN = 'admin';
    case CUSTOMER = 'customer';
}
