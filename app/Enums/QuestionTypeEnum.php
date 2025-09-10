<?php

/**
 * Enum QuestionTypeEnum
 * Author: Kashif Bhatti
 * 16/08/2025
 */

namespace App\Enums;

enum QuestionTypeEnum: string
{
    case TEXT = 'text';
    case NUMERIC = 'numeric';
    case SINGLE_CHOICE = 'single choice';
    case MULTI_CHOICE = 'multi choice';
    case RANGE = 'range';
}
