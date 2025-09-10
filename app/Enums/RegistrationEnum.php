<?php

/**
 * Enum RegistrationEnum
 * Author: Kashif Bhatti
 * 24/08/2025
 */

namespace App\Enums;

enum RegistrationEnum: string
{
    case MALE = 'I’m a man seeking a woman';
    case FEMALE = 'I’m a woman seeking a man';
    case GAY = 'I’m a man seeking a man';
    case LESBIAN = 'I’m a woman seeking a woman';
    case MALE_BI = 'I’m a man seeking everyone';
    case FEMALE_BI = 'I’m a woman seeking everyone';

    public static function options(): array
    {
        return array_map(fn ($case) => $case->value, self::cases());
    }
}
