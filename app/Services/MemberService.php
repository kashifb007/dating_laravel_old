<?php
/**
 * Class MemberService
 * Author: Kashif Bhatti
 * 06/09/2025
 */

namespace App\Services;

use App\Enums\MemberInfoEnum;
use App\Models\ProfileCategory;
use App\Models\ProfileQuestion;

class MemberService
{
    public function fetchMainPills(int $memberId): array
    {
        $buttons = [];
        $categoryId = ProfileCategory::whereSlug('main-information')->value('id');

        $questions = ProfileQuestion::query()
            ->where('profile_category_id', $categoryId)
            ->with([
                // free-text answers attached directly to the question
                'profileAnswers' => fn ($q) =>
                $q->where('user_id', $memberId)->with('answerable'),

                // answers attached to the question's choices (multi-select)
                'profileChoices.profileAnswers' => fn ($q) =>
                $q->where('user_id', $memberId)->with('answerable'),

                'profileChoices:id,profile_question_id,name',
            ])
            ->orderBy('sort_order')
            ->get();

        foreach ($questions as $question) {
            // Collect answers from: (a) the question itself, and (b) its choices
            $answers = collect();

            // (a) Free-text answers on the question
            if ($question->relationLoaded('profileAnswers')) {
                $answers = $answers->merge($question->profileAnswers);
            }

            // (b) Choice answers via each choice
            if ($question->relationLoaded('profileChoices')) {
                $answers = $answers->merge(
                    $question->profileChoices->flatMap(fn ($choice) => $choice->profileAnswers)
                );
            }

            if ($answers->isEmpty()) {
                continue;
            }

            // one “button” per selected answer (multi-select = multiple buttons):
            foreach ($answers as $ans) {
                $val = $ans->resolved_answer;
                if ($val === null) {
                    continue;
                }

                //cm to feet and inches for height
                if ($question->slug === 'height' && is_numeric($val)) {
                    $cm = (int)$val;
                    $inchesTotal = round($cm / 2.54);
                    $feet = intdiv($inchesTotal, 12);
                    $inches = $inchesTotal % 12;
                    $val = "{$feet}\" {$inches}' - {$cm}cm";
                }

                $buttons[] = (object) [
                    'question' => $question->name,
                    'answer'   => $val,
                    'icon'     => MemberInfoEnum::iconForSlug($question->slug),
                ];
            }

            // one button per question, joining multiple choices:
            /*
            $joined = $answers->map->resolved_answer->filter()->unique()->values()->join(', ');
            if ($joined !== '') {
                $this->buttons[] = (object) [
                    'question' => $question->name,
                    'answer'   => $joined,
                    'icon'     => null,
                ];
            }
            */
        }
        return $buttons ?? [];
    }

    /**
     * Great-circle distance between two lat/lng points.
     *
     * @throws \InvalidArgumentException
     */
    public function getMileage(
        float $fromLat,
        float $fromLng,
        float $toLat,
        float $toLng,
        bool $miles = true
    ): int {
        // Basic validation
        foreach ([['lat',$fromLat], ['lat',$toLat]] as [$k, $v]) {
            if ($v < -90 || $v > 90) {
                throw new \InvalidArgumentException("{$k} must be between -90 and 90.");
            }
        }
        foreach ([['lng',$fromLng], ['lng',$toLng]] as [$k, $v]) {
            if ($v < -180 || $v > 180) {
                throw new \InvalidArgumentException("{$k} must be between -180 and 180.");
            }
        }

        // Same point fast-path
        if ($fromLat === $toLat && $fromLng === $toLng) {
            return 0;
        }

        // Convert to radians
        $φ1 = deg2rad($fromLat);
        $φ2 = deg2rad($toLat);
        $Δφ = deg2rad($toLat - $fromLat);
        $Δλ = deg2rad($toLng - $fromLng);

        // Haversine
        $sinΔφ2 = sin($Δφ / 2.0);
        $sinΔλ2 = sin($Δλ / 2.0);

        $a = $sinΔφ2 * $sinΔφ2
            + cos($φ1) * cos($φ2) * $sinΔλ2 * $sinΔλ2;

        // Clamp for numerical safety
        $a = min(1.0, max(0.0, $a));

        $c = 2.0 * atan2(sqrt($a), sqrt(1.0 - $a));

        // Earth mean radius
        $R = $miles ? 3958.7613 /* miles */ : 6371.0088 /* km */;

        // Return whole miles/km as per signature
        return (int)round($R * $c);
    }
}
