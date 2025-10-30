<?php

use App\Models\ProfileCategory;
use App\Models\ProfileQuestion;
use App\Models\User;
use Livewire\Volt\Component;

new class extends Component {

    public User $user;
    public $profileQuestions;
    public array $profileAnswers = [];
    public string $description = '';
    public ProfileQuestion $question;

    public function mount()
    {
        $this->user = Auth::user();

        $this->question = ProfileQuestion::whereSlug('my-description')
            ->with('profileAnswers', function ($query) {
                $query->where('user_id', $this->user->id);
            })
            ->select('id', 'name')->first();

        $this->description = $this->question->profileAnswers->first()?->answer ?? '';

        $this->profileQuestions = ProfileCategory::whereSlug('my-answers')
            ->with('profileQuestions')
            ->with('profileQuestions.profileAnswers', function ($query) {
                $query->where('user_id', $this->user->id);
            })
            ->first()->profileQuestions;
    }

    public function saveDescription()
    {
        $validated = $this->validate([
            'description' => ['required', 'string', 'min:20', 'max:5000'],
        ]);

        $this->question->profileAnswers()->updateOrCreate(
            ['user_id' => $this->user->id],
            ['answer' => $validated['description']]
        );

        Flux::toast(text: "Description Saved",
            variant: 'success');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Description') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your description.") }}
        </p>
    </header>

    <form wire:submit="saveDescription">
        <div class="max-w-2xl">
            <flux:textarea
                wire:model="description"
                label="{{ $question->name }}"
                rows="5"
            />
        </div>

        <div class="h-8 mt-4 mb-8">
            <flux:button type="submit" class="cursor-pointer" variant="primary"
                         color="zinc">{{ __('ui.save') }}</flux:button>
        </div>
    </form>

    <flux:accordion transition>
        <flux:accordion.item>
            <flux:accordion.heading>Click here for Main Questions...</flux:accordion.heading>

            <flux:accordion.content>
                @forelse($profileQuestions as $question)
                    <livewire:pages.profile.components.main-question :key="$question->id" :$question :userId="$user->id"/>
                @empty
                    <span>{{ __('no questions') }}</span>
                @endforelse
            </flux:accordion.content>
        </flux:accordion.item>

    </flux:accordion>

</section>
