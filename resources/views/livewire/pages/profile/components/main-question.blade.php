<?php

use Livewire\Volt\Component;

new class extends Component {

    public $question;
    public int $userId;
    public string $answer = '';

    public function mount()
    {
        $this->answer = $this->question->profileAnswers->first()?->answer ?? '';
    }

    public function saveAnswer()
    {
        $validated = $this->validate([
            'answer' => ['required', 'string', 'min:15', 'max:300'],
        ]);

        $this->question->profileAnswers()->updateOrCreate(
            ['user_id' => $this->userId],
            ['answer' => $validated['answer']]
        );

        Flux::toast(text: "Answer Saved",
            variant: 'success');
    }
}; ?>

<div>
    <form wire:submit="saveAnswer">
        <div class="max-w-xl">
            <flux:textarea
                wire:model="answer"
                label="{{ $question->name }}"
                rows="2"
            />
        </div>

        <div class="h-8 mt-2 mb-8">
            <flux:button type="submit" class="cursor-pointer" variant="primary"
                         color="zinc">{{ __('ui.save') }}</flux:button>
        </div>
    </form>
</div>
