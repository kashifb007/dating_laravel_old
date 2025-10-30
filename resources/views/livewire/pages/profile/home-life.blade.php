<?php

use App\Models\ProfileCategory;
use App\Models\ProfileChoice;
use App\Models\ProfileQuestion;
use App\Models\User;
use Livewire\Volt\Component;

new class extends Component {
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function with(): array
    {
        $category = ProfileCategory::query()
            ->where('slug', 'home-life')
            ->first();

        $questions = collect();

        if ($category) {
            $questions = ProfileQuestion::query()
                ->where('profile_category_id', $category->id)
                ->orderBy('sort_order')
                ->with([
                    'profileChoices' => fn($q) => $q->orderBy('sort_order'),
                    'profileChoices.profileAnswers' => fn($q) => $q
                        ->where('user_id', Auth::id())
                        ->whereHasMorph('answerable', [ProfileChoice::class]),
                ])
                ->get();
        }

        return compact('questions');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Home Life') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your home life details.") }}
        </p>
    </header>

    <livewire:pages.profile.components.questions :questions="$questions" :user="$user" />
</section>
