<?php
/**
 * Class SaveHeight
 * Author: Kashif Bhatti
 * 22/09/2025
 */

namespace App\Actions\Customer;

use App\Models\ProfileQuestion;

class SaveHeightAction
{
    public function handle(int $height, int $userId): bool
    {
        $question = ProfileQuestion::whereSlug('height')->first();
        $question->profileAnswers()->updateOrCreate(
            ['user_id' => $userId],
            ['answer' => $height],
        );

        (new ProfileCheckAction($userId));

        return true;
    }
}
