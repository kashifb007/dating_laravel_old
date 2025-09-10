<?php

namespace Database\Seeders;

use App\Enums\QuestionTypeEnum;
use App\Models\ProfileCategory;
use App\Models\ProfileQuestion;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'My description',
            'My answers',
            'I am',
            'I am looking for',
        ];

        foreach ($categories as $category) {
            ProfileCategory::create([
                'name' => ['en' => $category],
                'slug' => $category,
            ]);
        }

        $subCategories = [
            'Main information',
            'About me',
            'Home life',
            'My hobbies',
        ];

        foreach ($subCategories as $category) {
            ProfileCategory::create([
                'name' => ['en' => $category],
                'slug' => $category,
                'parent_id' => ProfileCategory::whereSlug('i-am')->first()->id,
            ]);
        }

        $questions = [
            [
                'name' => ['en' => 'My description'],
                'profile_category_id' => ProfileCategory::whereSlug('my-description')->first()->id,
                'slug' => 'my-description',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 0,
                'show_question' => false,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'If I had an extra hour per day...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'If I had an extra hour per day',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 0,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'My dream holiday is...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'My dream holiday is',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 1,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'The things I always carry with me are...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'The things I always carry with me are',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 2,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'The show or book that would make me cancel my dinner plans is...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'The show or book that would make me cancel my dinner plans is',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 3,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'My work is...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'My work is',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 4,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'My superpower...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'My superpower',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 5,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'The worst thing I heard someone say about my love life...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'The worst thing I heard someone say about my love life',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 6,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Three things that make a relationship great...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'Three things that make a relationship great',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 7,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Favorite quality in a person...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'Favorite quality in a person',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 8,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'The way to my heart is through...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'The way to my heart is through',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 9,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'I’ll stay up late for...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'I’ll stay up late for',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 10,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Ethnicity'],
                'profile_category_id' => ProfileCategory::whereSlug('about-me')->first()->id,
                'slug' => 'Ethnicity',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 0,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Nationality'],
                'profile_category_id' => ProfileCategory::whereSlug('about-me')->first()->id,
                'slug' => 'Nationality',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 1,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Occupation'],
                'profile_category_id' => ProfileCategory::whereSlug('about-me')->first()->id,
                'slug' => 'Occupation',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 2,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Religion'],
                'profile_category_id' => ProfileCategory::whereSlug('about-me')->first()->id,
                'slug' => 'Religion',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 3,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'I think marriage is...'],
                'profile_category_id' => ProfileCategory::whereSlug('home-life')->first()->id,
                'slug' => 'I think marriage is',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 0,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Languages'],
                'profile_category_id' => ProfileCategory::whereSlug('home-life')->first()->id,
                'slug' => 'Languages',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 1,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'I live...'],
                'profile_category_id' => ProfileCategory::whereSlug('home-life')->first()->id,
                'slug' => 'I live',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 2,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Diet'],
                'profile_category_id' => ProfileCategory::whereSlug('home-life')->first()->id,
                'slug' => 'Diet',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 3,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'My pets'],
                'profile_category_id' => ProfileCategory::whereSlug('home-life')->first()->id,
                'slug' => 'My pets',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 4,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Interests'],
                'profile_category_id' => ProfileCategory::whereSlug('my-hobbies')->first()->id,
                'slug' => 'Interests',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 0,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Sports'],
                'profile_category_id' => ProfileCategory::whereSlug('my-hobbies')->first()->id,
                'slug' => 'Sports',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 1,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Entertainment'],
                'profile_category_id' => ProfileCategory::whereSlug('my-hobbies')->first()->id,
                'slug' => 'Entertainment',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 2,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'My favourite films'],
                'profile_category_id' => ProfileCategory::whereSlug('my-hobbies')->first()->id,
                'slug' => 'My favourite films',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 3,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'My taste in music'],
                'profile_category_id' => ProfileCategory::whereSlug('my-hobbies')->first()->id,
                'slug' => 'My taste in music',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 4,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Age'],//range of age looking for
                'profile_category_id' => ProfileCategory::whereSlug('i-am-looking-for')->first()->id,
                'slug' => 'Age',
                'type' => QuestionTypeEnum::RANGE->value,
                'sort_order' => 0,
                'show_question' => true,
                'is_required' => true,
            ],
            [
                'name' => ['en' => 'Height'],
                'profile_category_id' => ProfileCategory::whereSlug('main-information')->first()->id,
                'slug' => 'Height',
                'type' => QuestionTypeEnum::NUMERIC->value,
                'sort_order' => 0,
                'show_question' => false,
                'is_required' => true,
                'min_value' => 140,
                'max_value' => 200,
            ],
            [
                'name' => ['en' => 'Education'],
                'profile_category_id' => ProfileCategory::whereSlug('main-information')->first()->id,
                'slug' => 'Education',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 1,
                'show_question' => false,
                'is_required' => true,
            ],
            [
                'name' => ['en' => 'Smoke'],
                'profile_category_id' => ProfileCategory::whereSlug('main-information')->first()->id,
                'slug' => 'Smoke',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 2,
                'show_question' => false,
                'is_required' => true,
            ],
            [
                'name' => ['en' => 'Has kids'],
                'profile_category_id' => ProfileCategory::whereSlug('main-information')->first()->id,
                'slug' => 'Has kids',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 3,
                'show_question' => false,
                'is_required' => true,
            ],
            [
                'name' => ['en' => 'Want kids'],
                'profile_category_id' => ProfileCategory::whereSlug('main-information')->first()->id,
                'slug' => 'Want kids',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 4,
                'show_question' => false,
                'is_required' => true,
            ],
            [
                'name' => ['en' => 'Looking for'],// true love, meet new people etc.
                'profile_category_id' => ProfileCategory::whereSlug('main-information')->first()->id,
                'slug' => 'Looking for',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 5,
                'show_question' => false,
                'is_required' => true,
            ],
        ];

        foreach ($questions as $question) {
            ProfileQuestion::create($question);
        }

    }
}
