<div>
    <x-slot:headerClasses>sticky top-[65px] z-20</x-slot:headerClasses>
    <x-slot name="header">
        <div class="flex flex-row space-x-8 items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('ui.search_profiles') }}
                </h2>
            </div>
            <div>
                <flux:button
                    x-data=""
                    icon="adjustments-horizontal"
                    variant="primary"
                    color="zinc"
                    class="hover:cursor-pointer"
                    @click="window.dispatchEvent(new CustomEvent('open-modal', { detail: 'breeze-modal' }))"
                >
                    {{ __('ui.filters') }}
                </flux:button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div
            class="max-w-7xl mx-6 sm:mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
            x-data
            @likes-updated.window="
        document.querySelectorAll('[wire\\:key^=member-]').forEach(el => {
            if (el.__x) {
                el.__x.$data.likedMembers = $event.detail;
            }
        });
    ">
            @forelse ($this->members as $member)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg flex flex-col relative"
                     wire:key="member-{{ $member->id }}"
                     x-data="{
        likedMembers: @js($this->likes),
        isLiked(memberId) {
            return this.likedMembers.includes(memberId);
        },
        debouncedAddLike: null,
        debouncedRemoveLike: null,

        init() {
            this.debouncedAddLike = debounce((id, name) => {
                this.$wire.addLike(id, name);
            }, 1000);

            this.debouncedRemoveLike = debounce((id, name) => {
                this.$wire.removeLike(id, name);
            }, 1000);
        }
     }">
                    <div class="text-gray-900 dark:text-gray-100 relative">
                        @php
                            $md = $member->images()->whereIsApproved(true)->orderBy('sort_order')->limit(1)->first()->getFirstMediaUrl('profile_images', 'md') ?: asset('images/placeholder.png');
                            $sm = $member->images()->whereIsApproved(true)->orderBy('sort_order')->limit(1)->first()->getFirstMediaUrl('profile_images', 'sm') ?: asset('images/placeholder.png');
                        @endphp
                            <!-- profile Image -->
                        <div class="w-full h-80 mb-4 overflow-hidden md:hidden">
                            <a href="{{ route('member.profile', ['member' => $member->id]) }}"
                               wire:navigate>
                                <img src="{{ $md }}" alt="{{ $member->first_name }}"
                                 class="w-full h-80 object-cover transition-transform duration-200 hover:scale-110">
                            </a>
                        </div>
                        <div class="w-full h-80 mb-4 overflow-hidden hidden md:block">
                            <a href="{{ route('member.profile', ['member' => $member->id]) }}"
                               wire:navigate>
                            <img src="{{ $sm }}" alt="{{ $member->first_name }}"
                                 class="w-full h-80 object-cover transition-transform duration-200 hover:scale-110">
                            </a>
                        </div>

                        <!-- Action Icons: -->
                        <div class="absolute -bottom-3 right-2 flex space-x-2 z-10" x-data="{ isLoading: false }">
                            <!-- Message Icon (unchanged) -->
                            <a href="javascript:void(0);"
                               title="Send message"
                               class="w-12 h-12 shadow-lg rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110"
                               style="background-color: #24c43e;">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                          d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.678 3.348-3.97z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>

                            <!-- Like/Unlike Button -->
                            <template x-if="isLiked({{ $member->id }}) && !isLoading">
                                <!-- Heart Icon (Solid) -->
                                <a href="javascript:void(0);"
                                   @click="
    isLoading = true;
    debouncedRemoveLike({{ $member->id }}, '{{ $member->first_name }}');
    likedMembers = likedMembers.filter(id => id !== {{ $member->id }});
    setTimeout(() => isLoading = false, 300);
"
                                   title="Remove from likes"
                                   class="w-12 h-12 bg-pink-600 bg-opacity-80 hover:bg-opacity-100 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
                                    </svg>
                                </a>
                            </template>
                            <template x-if="!isLiked({{ $member->id }}) && !isLoading">
                                <!-- Heart Icon (Outline) -->
                                <a href="javascript:void(0);"
                                   @click="
    isLoading = true;
    debouncedAddLike({{ $member->id }}, '{{ $member->first_name }}');
    likedMembers.push({{ $member->id }});
    setTimeout(() => isLoading = false, 300);
"
                                   title="Add to likes"
                                   class="w-12 h-12 bg-pink-600 bg-opacity-80 hover:bg-opacity-100 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                                    </svg>
                                </a>
                            </template>
                            <!-- Loading State -->
                            <template x-if="isLoading">
                                <div class="w-12 h-12 mr-2 bg-pink-600 bg-opacity-80 rounded-full flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-lg font-bold hover:underline"><a title="{{ __('View Profile') }}"
                                                        href="{{ route('member.profile', ['member' => $member->id]) }}"
                                                        wire:navigate>{{ $member->first_name }}
                        </a></p>
                        <p>{{ $member->profile->age }}, {{ $member->profile->city }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 dark:text-gray-400">No profiles found.</p>
            @endforelse
            @if ($hasMore)
                <div
                    x-intersect.full="$wire.loadMoreMembers()"
                    class="col-span-full flex items-center justify-center p-4"
                >
                    <div wire:loading.delay.shortest wire:target="loadMoreMembers"
                         class="text-sm text-gray-500 dark:text-gray-400">
                        Loading more profiles…
                    </div>
                </div>
            @endif
        </div>
    </div>
    <x-modal name="breeze-modal" :title="__('Filters')" :show-buttons="true" :show-reset="true">
        <div class="my-4 space-y-4">
            <flux:fieldset>
                <flux:legend>Age</flux:legend>
                    <!-- Age Range Slider -->
                    <div x-data="rangeSlider()"
                         x-init="init($wire.minAge, $wire.maxAge, {{ Js::from(__('ui.filters_age')) }})"
                         @range-changed="updateWireModel($event.detail)">
                        <div class="mb-4">
        <span class="text-sm font-medium text-gray-700 dark:text-gray-300" x-text="getTranslatedText()">
        </span>
                        </div>

                        <div class="relative">

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
            </flux:fieldset>
            <div class="mt-8">
                <flux:separator />
            </div>
        </div>
        <div class="my-4 space-y-4">
            <flux:fieldset>
                <flux:legend>Distance</flux:legend>
                <!-- Distance Slider -->
                <div x-data="distanceSlider()"
                     x-init="init($wire.distance, $wire.isMiles, {{ Js::from(__('ui.filters_miles')) }}, {{ Js::from(__('ui.filters_km')) }})"
                     @distance-changed="updateWireModel($event.detail)">
                    <div class="mb-4">
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300" x-text="getTranslatedText()">
                        </span>
                    </div>

                    <div class="relative">
                        <!-- Distance Track -->
                        <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-lg relative cursor-pointer"
                             @click="handleTrackClick($event)">
                            <!-- Active Range -->
                            <div class="h-2 bg-blue-500 rounded-lg absolute pointer-events-none"
                                 :style="`width: ${percent}%`"></div>
                        </div>

                        <!-- Distance Input -->
                        <input type="range"
                               min="0"
                               max="15"
                               step="1"
                               class="absolute w-full h-2 bg-transparent appearance-none cursor-pointer distance-slider-thumb"
                               x-model="sliderIndex"
                               @input="updateDistance()">
                    </div>
                </div>
            </flux:fieldset>
            <div class="mt-8">
                <flux:separator />
            </div>
        </div>
        <div class="pb-4">
            <div class="w-40 space-y-4">
                <flux:fieldset>
                    <flux:legend>Option Match</flux:legend>
                    <div class="space-y-4">
                        <flux:switch wire:model="isOnline" label="Online" />
                        <flux:separator variant="subtle" />
                        <flux:switch wire:model="isVerified" label="Verified profile" />
                        <flux:separator variant="subtle" />
                    </div>
                </flux:fieldset>
            </div>
        </div>

        <div class="w-full" wire:loading>
            <flux:icon.loading />
        </div>

        <div class="flex justify-between">
            <div>
                <flux:button
                    class="hover:cursor-pointer"
                    wire:click.prevent="applyFilters"
                    wire:loading.attr="disabled"
                    variant="primary"
                    color="green"
                    icon="check">
                    {{ __('Apply') }}
                </flux:button>
    </x-modal>

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

        .distance-slider-thumb {
            pointer-events: none;
        }

        .distance-slider-thumb::-webkit-slider-thumb {
            appearance: none;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #3b82f6;
            cursor: pointer;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            pointer-events: auto;
            position: relative;
            margin-top: -15px;
        }

        .distance-slider-thumb::-moz-range-thumb {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #3b82f6;
            cursor: pointer;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            pointer-events: auto;
            margin-top: -15px;
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

        function distanceSlider() {
            return {
                sliderIndex: 0,
                currentValue: 5,
                percent: 0,
                debounceTimer: null,
                distanceValues: [5, 6, 7, 8, 9, 10, 15, 20, 30, 40, 50, 100, 200, 300, 400, 500],

                init(currentDistance, isMiles, milesTemplate, kmTemplate) {
                    // Find the closest distance value or default to first
                    const index = this.distanceValues.findIndex(val => val === currentDistance);
                    this.sliderIndex = index >= 0 ? index : 0;
                    this.currentValue = this.distanceValues[this.sliderIndex];
                    this.isMiles = isMiles;
                    this.milesTemplate = milesTemplate;
                    this.kmTemplate = kmTemplate;
                    this.updatePercent();
                },

                getTranslatedText() {
                    // Use the appropriate template based on the isMiles flag
                    const template = this.isMiles ? this.milesTemplate : this.kmTemplate;
                    return template.replace(':value', this.currentValue);
                },

                updateDistance() {
                    this.currentValue = this.distanceValues[this.sliderIndex];
                    this.updatePercent();

                    // Clear existing debounce timer
                    if (this.debounceTimer) {
                        clearTimeout(this.debounceTimer);
                    }

                    // Set new debounce timer for 0.5 seconds
                    this.debounceTimer = setTimeout(() => {
                        this.$dispatch('distance-changed', {
                            distance: parseInt(this.currentValue)
                        });
                    }, 500);
                },

                updatePercent() {
                    this.percent = (this.sliderIndex / 15) * 100;
                },

                handleTrackClick(event) {
                    const rect = event.target.getBoundingClientRect();
                    const clickX = event.clientX - rect.left;
                    const trackWidth = rect.width;
                    const clickPercent = clickX / trackWidth;

                    // Convert to slider index (0-15)
                    const newIndex = Math.round(clickPercent * 15);
                    this.sliderIndex = Math.max(0, Math.min(15, newIndex));
                    this.updateDistance();
                },

                updateWireModel(detail) {
                    this.$wire.distance = detail.distance;
                }
            }
        }
    </script>
</div>
