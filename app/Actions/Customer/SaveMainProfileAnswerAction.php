<?php
/**
 * Class SaveMainProfileAnswer
 * Author: Kashif Bhatti
 * 21/09/2025
 */

namespace App\Actions\Customer;

use App\Enums\QuestionTypeEnum;
use App\Models\ProfileChoice;

class SaveMainProfileAnswerAction
{
    public function __construct(private readonly int $choiceId, private readonly int $userId, private readonly QuestionTypeEnum $questionType)
    {}

    public function handle(): bool
    {
        $choice = ProfileChoice::query()
            ->with('profileAnswers')
            ->find($this->choiceId);

        if (!$choice) {
            return false;
        }

        // Check if the user has already selected this choice
        $existingAnswer = $choice->profileAnswers
            ->where('user_id', $this->userId)
            ->first();

        $otherChoices = ProfileChoice::query()
            ->where('profile_question_id', $choice->profile_question_id)
            ->whereHas('profileAnswers', function ($query) {
                $query->where('user_id', $this->userId);
            })
            ->whereNot('id', $this->choiceId)
            ->with('profileAnswers')
            ->get();

        if ($existingAnswer) {
            if ($this->questionType === QuestionTypeEnum::SINGLE_CHOICE) {
                // no update if single choice question
                return true;
            } elseif ($this->questionType === QuestionTypeEnum::MULTI_CHOICE && $otherChoices->isNotEmpty()) {
                // If the answer exists and other answers are selected, delete it (toggle off)
                $existingAnswer->delete();
            }
            return true;
        } else {
            if ($this->questionType === QuestionTypeEnum::SINGLE_CHOICE) {
                //first detach other choices for this question

                foreach ($otherChoices as $otherChoice) {
                    $otherAnswer = $otherChoice->profileAnswers
                        ->where('user_id', $this->userId)
                        ->first();

                    if (filled($otherAnswer)) {
                        $otherAnswer->delete();
                    }
                }
            }

            // If the answer does not exist, create it (toggle on)
            $choice->profileAnswers()->create([
                'user_id' => $this->userId,
            ]);

            new ProfileCheckAction($this->userId);

            return true;
        }
    }
}
