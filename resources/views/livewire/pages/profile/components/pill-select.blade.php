<?php

use App\Actions\Customer\SaveMainProfileAnswerAction;
use App\Enums\QuestionTypeEnum;
use App\Models\ProfileChoice;
use App\Models\ProfileQuestion;
use Livewire\Volt\Component;

new class extends Component {
    public int $userId;
    public int $questionId;

    public function with(): array
    {
        $question = ProfileQuestion::query()
            ->where('id', $this->questionId)
            ->with([
                'profileChoices' => fn($q) => $q->orderBy('sort_order'),
                'profileChoices.profileAnswers' => fn($q) => $q
                    ->where('user_id', Auth::id())
                    ->whereHasMorph('answerable', [ProfileChoice::class]),
            ])
            ->first();

        return compact('question');
    }

    public function saveAnswer(int $choiceId, QuestionTypeEnum $questionType): void
    {
        $saveAnswer = new SaveMainProfileAnswerAction($choiceId, Auth::id(), $questionType);

        if ($saveAnswer->handle()) {
            Flux::toast(text: "Answer Saved",
                variant: 'success');
        }
    }

}; ?>

<div class="flex flex-wrap gap-3 mt-2">
    @foreach ($question->profileChoices as $choice)
        @php
            $checked = $choice->profileAnswers->isNotEmpty();
        @endphp
        @if($checked && $question->type === \App\Enums\QuestionTypeEnum::SINGLE_CHOICE)
            <a href="javascript:void(0);"
               class="relative pointer-events-none hover:cursor-default">
                <span
                @class([
                    'dark:hover:bg-gray-500 hover:bg-gray-300 text-sm font-medium px-3 py-1 rounded-full',
                    'bg-rose-600 text-white dark:text-gray-300' => $checked,
                    'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200' => !$checked,
                ])>
        @else
                        <a href="javascript:void(0);"
                           wire:click.debounce="saveAnswer({{ $choice->id }}, '{{ $question->type }}')"
                           class="relative"
                           wire:loading.class="pointer-events-none opacity-50"
                           wire:target="saveAnswer">
                <span
                @class([
                    'dark:hover:bg-gray-500 hover:bg-gray-300 text-sm font-medium px-3 py-1 rounded-full',
                    'bg-rose-600 hover:bg-rose-700 dark:hover:bg-rose-700 text-white dark:text-gray-300' => $checked,
                    'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200' => !$checked,
                ])>
        @endif
                    {{ $choice->name }}
            </span>
            <span wire:loading
                  wire:target="saveAnswer({{ $choice->id }}, '{{ $question->type }}')"
                  x-data="{show: false}"
                  x-init="setTimeout(() => { show = true }, 0); setTimeout(() => { show = false }, 500)"
                  x-show="show"
                  class="ml-1 inline-block">
                <svg class="animate-spin h-4 w-4 text-blue-500"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </span>
            </a>
            @endforeach
</div>
