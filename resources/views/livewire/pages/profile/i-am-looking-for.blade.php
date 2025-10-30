<?php

use Livewire\Volt\Component;

new class extends Component {
    public int $minAge = 18;
    public int $maxAge = 45;

    public function mount()
    {
        $this->minAge = Cache::remember('user.' . Auth::user()->id . '.min_age', now()->addDay(), static fn() => Auth::user()->profile->min_age);
        $this->maxAge = Cache::remember('user.' . Auth::user()->id . '.max_age', now()->addDay(), static fn() => Auth::user()->profile->max_age);
    }

    public function saveAge(): void
    {
        Auth::user()->profile->min_age = $this->minAge;
        Auth::user()->profile->max_age = $this->maxAge;
        Auth::user()->profile->save();

        Cache::put('user.' . Auth::user()->id . '.min_age', $this->minAge, now()->addDay());
        Cache::put('user.' . Auth::user()->id . '.max_age', $this->maxAge, now()->addDay());

        Flux::toast(text: "Answer Saved",
            variant: 'success');
    }

}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('I am looking for') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update the age group you are interested in.") }}
        </p>
    </header>

    <div>
        <!-- Age Range Slider -->
        <div x-data="rangeSlider()"
             x-init="init($wire.minAge, $wire.maxAge, {{ Js::from(__('ui.filters_age')) }})"
             @range-changed="updateWireModel($event.detail)">
            <div class="mb-4">
        <span class="text-sm font-medium text-gray-700 dark:text-gray-300" x-text="getTranslatedText()">
        </span>
            </div>

            <div class="relative max-w-xl">

                <!-- Range Track -->
                <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-lg relative">
                    <!-- Active Range -->
                    <div class="h-2 bg-pink-500 rounded-lg absolute"
                         :style="`left: ${minPercent}%; width: ${maxPercent - minPercent}%`"></div>
                </div>

                <!-- Min Range Input -->
                <input type="range"
                       min="18"
                       max="100"
                       step="1"
                       class="absolute w-full h-2 bg-transparent appearance-none cursor-pointer range-slider-thumb range-min"
                       x-model="minValue"
                       @input="updateRange()"
                       @mousedown="bringToFront('min')"
                       @touchstart="bringToFront('min')">

                <!-- Max Range Input -->
                <input type="range"
                       min="18"
                       max="100"
                       step="1"
                       class="absolute w-full h-2 bg-transparent appearance-none cursor-pointer range-slider-thumb range-max"
                       x-model="maxValue"
                       @input="updateRange()"
                       @mousedown="bringToFront('max')"
                       @touchstart="bringToFront('max')">
            </div>
        </div>

        <div class="h-8 mt-6">
            <flux:button wire:click.prevent="saveAge" class="cursor-pointer" variant="primary"
                         color="zinc">{{ __('ui.save') }}</flux:button>
        </div>

    </div>

    <style>
        .range-slider-thumb {
            pointer-events: none;
        }

        .range-slider-thumb::-webkit-slider-thumb {
            appearance: none;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #ec4899;
            cursor: pointer;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            pointer-events: auto;
            position: relative;
            margin-top: -15px;
        }

        .range-slider-thumb::-moz-range-thumb {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #ec4899;
            cursor: pointer;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            pointer-events: auto;
            margin-top: -15px;
        }

        .dark .range-slider-thumb::-webkit-slider-thumb {
            border: 2px solid #374151;
        }

        .dark .range-slider-thumb::-moz-range-thumb {
            border: 2px solid #374151;
        }

        .range-min {
            z-index: 1;
        }

        .range-max {
            z-index: 2;
        }

        .range-active {
            z-index: 3 !important;
        }

        .dark .distance-slider-thumb::-webkit-slider-thumb {
            border: 2px solid #374151;
        }

        .dark .distance-slider-thumb::-moz-range-thumb {
            border: 2px solid #374151;
        }
    </style>

    <script>
        function debounce(func, wait) {
            let timeout;
            return function(...args) {
                const context = this;
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(context, args), wait);
            };
        }

        function rangeSlider() {
            return {
                minValue: 18,
                maxValue: 100,
                minPercent: 0,
                maxPercent: 100,
                debounceTimer: null,
                template: '',

                init(minAge, maxAge, translationTemplate) {
                    this.minValue = minAge;
                    this.maxValue = maxAge;
                    this.template = translationTemplate;
                    this.updateRange();
                },

                getTranslatedText() {
                    return this.template.replace(':min', this.minValue).replace(':max', this.maxValue);
                },

                bringToFront(type) {
                    // Remove range-active from all slider thumbs using raw JavaScript
                    document.querySelectorAll('.range-slider-thumb').forEach(input => {
                        input.classList.remove('range-active');
                    });

                    // Add range-active to the specific element based on type
                    if (type === 'min') {
                        document.querySelector('.range-min').classList.add('range-active');
                    } else {
                        document.querySelector('.range-max').classList.add('range-active');
                    }
                },

                updateRange() {
                    // Ensure min doesn't exceed max
                    if (parseInt(this.minValue) > parseInt(this.maxValue)) {
                        this.minValue = this.maxValue;
                    }

                    // Ensure max doesn't go below min
                    if (parseInt(this.maxValue) < parseInt(this.minValue)) {
                        this.maxValue = this.minValue;
                    }

                    // Calculate percentages
                    this.minPercent = ((this.minValue - 18) / (100 - 18)) * 100;
                    this.maxPercent = ((this.maxValue - 18) / (100 - 18)) * 100;

                    // Clear existing debounce timer
                    if (this.debounceTimer) {
                        clearTimeout(this.debounceTimer);
                    }

                    // Set new debounce timer for 0.5 second
                    this.debounceTimer = setTimeout(() => {
                        this.$dispatch('range-changed', {
                            min: parseInt(this.minValue),
                            max: parseInt(this.maxValue)
                        });
                    }, 500);
                },

                updateWireModel(detail) {
                    this.$wire.minAge = detail.min;
                    this.$wire.maxAge = detail.max;
                }
            }
        }
        </script>
</section>
