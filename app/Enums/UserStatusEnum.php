<?php

/**
 * Enum UserStatusEnum
 * Author: Kashif Bhatti
 * 19/08/2025
 */

namespace App\Enums;

enum UserStatusEnum: string
{
    case ACTIVE = 'active';
    case UNDER_REVIEW = 'under review';
    case REPORTED = 'reported';
    case BANNED = 'banned';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::UNDER_REVIEW => 'Under Review',
            self::REPORTED => 'Reported',
            self::BANNED => 'Banned',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $c) => [$c->value => $c->label()])
            ->all();
    }
}
