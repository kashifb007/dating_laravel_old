<?php

use App\Actions\Customer\CitySearchAction;
use App\Actions\Customer\ProfileCheckAction;
use App\Actions\Customer\SaveHeightAction;
use App\Actions\Customer\SaveMainProfileAnswerAction;
use App\DataTransferObjects\NominatimDto;
use App\Models\Country;
use App\Models\Language;
use App\Models\ProfileCategory;
use App\Models\ProfileChoice;
use App\Models\ProfileQuestion;
use App\Models\User;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {

    public ?int $height = null;
    public User $user;

    public function mount(): void
    {
        $this->user = auth()->user();
        $question = ProfileQuestion::query()
            ->with('profileAnswers', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereSlug('height')->first();

        $this->height = $question->profileAnswers->first()?->answer;
    }

    public function with(): array
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
                    'profileChoices' => fn($q) => $q->orderBy('sort_order'),
                    'profileChoices.profileAnswers' => fn($q) => $q
                        ->where('user_id', Auth::id())
                        ->whereHasMorph('answerable', [ProfileChoice::class]),
                ])
                ->get();
        }

        return compact('questions');
    }

    public function saveHeight(): void
    {
        $this->validate([
            'height' => ['required', 'integer', 'min:130', 'max:250'],
        ]);

        $saveHeight = new SaveHeightAction();
        if ($saveHeight->handle($this->height, Auth::id())) {
            Flux::toast(text: "Profile Saved",
                variant: 'success');
        }
    }

    public function saveAnswer(int $choiceId, string $questionType): void
    {
        $saveAnswer = new SaveMainProfileAnswerAction($choiceId, Auth::id(), $questionType);
        if ($saveAnswer->handle()) {
            Flux::toast(text: "Answer Saved",
                variant: 'success');
        }
    }

}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your profile information.") }}
        </p>
    </header>

    <form wire:submit="saveHeight">
        <div class="w-xs mt-2" x-data="{
        height: @entangle('height'),
        getFeetInches() {
            if (!this.height) return '';

            const inchesTotal = Math.round(this.height / 2.54);
            const feet = Math.floor(inchesTotal / 12);
            const inches = inchesTotal % 12;

            return `${feet}' ${inches}&quot; - ${this.height}cm`;
             }
             }">
            <flux:input type="number" label="{{ __('ui.height') }}" wire:model="height" class="mb-1" required/>
            <span x-text="getFeetInches()"></span>

            <div class="h-8 mt-1">
                <flux:button type="submit" class="cursor-pointer" variant="primary"
                             color="zinc">{{ __('ui.save') }}</flux:button>
            </div>
        </div>
    </form>

    <livewire:pages.profile.components.questions :questions="$questions" :user="$user"/>

</section>
