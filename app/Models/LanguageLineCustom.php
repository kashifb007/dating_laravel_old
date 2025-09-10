<?php

namespace App\Models;

use Spatie\TranslationLoader\LanguageLine;

class LanguageLineCustom extends LanguageLine
{
    protected $table = 'language_lines';

    protected $casts = ['text' => 'json'];

}
