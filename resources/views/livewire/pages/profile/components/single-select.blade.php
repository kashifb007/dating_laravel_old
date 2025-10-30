<?php

use App\Models\ProfileAnswer;
use App\Models\ProfileChoice;
use App\Models\ProfileQuestion;
use Livewire\Volt\Component;

new class extends Component {
    public ProfileQuestion $question;
    public int $userId;
    public ?int $selectedChoiceId = null;

    public function mount()
    {
        $this->selectedChoiceId = ProfileAnswer::where('user_id', $this->userId)
            ->whereHasMorph('answerable', [ProfileChoice::class], function ($query) {
                $query->where('profile_question_id', $this->question->id);
            })
            ->first()?->answerable_id;
    }

    public function updatedSelectedChoiceId()
    {
        $oldAnswer = ProfileAnswer::where('user_id', $this->userId)
            ->whereHasMorph('answerable', [ProfileChoice::class], function ($query) {
                $query->where('profile_question_id', $this->question->id);
            })
            ->first();

        if (filled($oldAnswer)) {
            $oldAnswer->delete();
        }

        $choice = ProfileChoice::find($this->selectedChoiceId);

        $choice->profileAnswers()->create([
            'user_id' => $this->userId,
        ]);

        Flux::toast(text: "Answer Saved",
            variant: 'success');
    }
}; ?>

<div class="max-w-md" wire:key="single-select-{{ $question->id }}">
    <flux:select variant="listbox" searchable placeholder="{{ $question->name }}" id="select-{{ $question->id }}"
                 wire:key="select-{{ $question->id }}" wire:model.live.debounce.250ms="selectedChoiceId">
        @foreach ($question->profileChoices as $choice)
            <flux:select.option value="{{ $choice->id }}">{{ $choice->name }}</flux:select.option>
        @endforeach
    </flux:select>
</div>
