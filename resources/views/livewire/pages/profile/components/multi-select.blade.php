<?php

use App\Models\ProfileAnswer;
use App\Models\ProfileChoice;
use App\Models\ProfileQuestion;
use Livewire\Volt\Component;

new class extends Component {
    public ProfileQuestion $question;
    public int $userId;
    public array $selectedChoices = [];

    public function mount()
    {
        $this->selectedChoices = ProfileAnswer::where('user_id', $this->userId)
            ->whereHasMorph('answerable', [ProfileChoice::class], function ($query) {
                $query->where('profile_question_id', $this->question->id);
            })
            ->get()->pluck('answerable_id')->toArray();
    }

    public function updatedSelectedChoices()
    {
        $oldAnswers = ProfileAnswer::where('user_id', $this->userId)
            ->whereHasMorph('answerable', [ProfileChoice::class], function ($query) {
                $query->where('profile_question_id', $this->question->id);
            })
            ->whereNotIn('answerable_id', $this->selectedChoices)
            ->get();

        foreach ($oldAnswers as $oldAnswer) {
            $oldAnswer->delete();
        }

        $choices = ProfileChoice::whereIn('id', $this->selectedChoices)->get();

        foreach ($choices as $choice) {
            $choice->profileAnswers()->updateOrCreate([
                'user_id' => $this->userId,
            ]);
        }

        Flux::toast(text: "Answer Saved",
            variant: 'success');
    }
}; ?>

<div class="max-w-xl" wire:key="multi-select-{{ $question->id }}">
    <flux:pillbox multiple searchable placeholder="{{ $question->name }}" id="select-{{ $question->id }}"
                  wire:key="select-{{ $question->id }}" wire:model.live.debounce.500ms="selectedChoices">
        @foreach ($question->profileChoices as $choice)
            <flux:pillbox.option value="{{ $choice->id }}">{{ $choice->name }}</flux:pillbox.option>
        @endforeach
    </flux:pillbox>
</div>
