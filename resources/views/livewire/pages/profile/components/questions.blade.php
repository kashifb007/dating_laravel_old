<?php

use App\Models\User;
use Livewire\Volt\Component;

new class extends Component {
    public $questions;
    public User $user;

}; ?>

<div class="space-y-2 w-full mt-2">
    @foreach ($questions as $question)
        <div class="mt-6" wire:key="question-{{ $question->id }}">
            {{ $question->name }}
            @if ($question->profileChoices->count() > 15)
                @if ($question->type === \App\Enums\QuestionTypeEnum::SINGLE_CHOICE)
                    <livewire:pages.profile.components.single-select :key="$question->id"
                                                                     :question="$question"
                                                                     :userId="$user->id"/>
                @elseif ($question->type === \App\Enums\QuestionTypeEnum::MULTI_CHOICE)
                    <livewire:pages.profile.components.multi-select :key="$question->id"
                                                                    :question="$question"
                                                                    :userId="$user->id"/>
                @endif
            @else
                <livewire:pages.profile.components.pill-select :key="$question->id"
                                                               :questionId="$question->id"
                                                               :userId="$user->id"/>
            @endif
        </div>
    @endforeach
</div>
