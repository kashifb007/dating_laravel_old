<?php
/**
 * Enum MemberInfoEnum
 * Author: Kashif Bhatti
 * 06/09/2025
 */

namespace App\Enums;

enum MemberInfoEnum: string
{
    case HEIGHT = 'numbered-list';
    case EDUCATION = 'academic-cap';
    case SMOKE = 'fire';
    case HAS_CHILDREN = 'users';
    case WANT_CHILDREN = 'user-plus';
    case LOOKING_FOR = 'heart';

    public static function fromSlug(string $slug): ?self
    {
        // normalize: replace non-letters and uppercase => 'has-kids' -> 'HAS_KIDS'
        $candidate = strtoupper(preg_replace('/[^a-z]/i', '_', $slug));

        foreach (self::cases() as $case) {
            if ($case->name === $candidate) {
                return $case;
            }
        }

        return null;
    }

    public static function iconForSlug(string $slug): ?string
    {
        return self::fromSlug($slug)?->value;
    }
}
