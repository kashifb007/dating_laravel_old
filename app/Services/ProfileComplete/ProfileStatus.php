<?php
/**
 * Class ProfileStatus
 * Author: Kashif Bhatti
 * 21/09/2025
 */

namespace App\Services\ProfileComplete;

use App\Models\ProfileCategory;
use App\Models\ProfileChoice;
use App\Models\ProfileQuestion;
use App\Models\User;

/**
 * Check the profile table for the user here
 */
class ProfileStatus
{
    private User $user;
    public bool $location;
    public bool $height;
    public bool $mainInformation;

    public function __construct(int $memberId)
    {
        $this->user = User::whereId($memberId)->with('profile')->firstOrFail();
        $this->location = $this->checkLocation();
        $this->height = $this->checkHeight();
        $this->mainInformation = $this->checkMainInformation();
    }

    /**
     * Check if location is set
     */
    public function checkLocation(): bool
    {
        return null !== $this->user->profile->city
            && null !== $this->user->profile->latitude
            && null !== $this->user->profile->longitude
            && null !== $this->user->profile->country_id;
    }

    /**
     * Check if height is set
     */
    public function checkHeight(): bool
    {
        $question = ProfileQuestion::query()
            ->with('profileAnswers', function ($query) {
                $query->where('user_id', $this->user->id);
            })
            ->whereSlug('height')->first();

        return $question->profileAnswers->isNotEmpty();
    }

    /**
     * Check if main profile information is set
     */
    public function checkMainInformation(): bool
    {
        $category = ProfileCategory::query()
            ->where('slug', 'main-information')
            ->first();

        $questions = collect();

        if ($category) {
            $questions = ProfileQuestion::query()
                ->where('profile_category_id', $category->id)
                ->where('type', 'single choice')
                ->orderBy('sort_order')
                ->with([
                    // Load answers on the choices, filtered to the current user and morph type
                    'profileChoices.profileAnswers' => fn($q) => $q
                        ->where('user_id', $this->user->id)
                        ->whereHasMorph('answerable', [ProfileChoice::class]),
                ]);
        }

        $questionCount = $questions->count();
        $answeredCount = 0;

        foreach ($questions->get() as $question) {
            foreach ($question->profileChoices as $choice) {
                if ($choice->profileAnswers->isNotEmpty()) {
                    $answeredCount++;
                    break; // No need to check other choices if one is answered
                }
            }
        }

        return $questionCount === $answeredCount;
    }
}
