<div>
    <x-slot name="header" class="sticky top-10 z-10">
        <div class="flex flex-row space-x-8 items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Search Profiles') }}
                </h2>
            </div>
            @auth
                <div>
                    <flux:button
                        x-data=""
                        icon="adjustments-horizontal"
                        variant="primary"
                        color="zinc"
                        class="hover:cursor-pointer"
                        @click="window.dispatchEvent(new CustomEvent('open-modal', { detail: 'breeze-modal' }))"
                    >
                        Filters
                    </flux:button>
                </div>
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div
            class="max-w-7xl mx-6 sm:mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($this->members as $member)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg flex flex-col relative"
                     wire:key="member-{{ $member->id }}">
                    <div class="text-gray-900 dark:text-gray-100 relative">
                        @php
                            $md = $member->images()->whereIsApproved(true)->orderBy('sort_order')->limit(1)->first()->getFirstMediaUrl('profile_images', 'md') ?: asset('images/placeholder.png');
                            $sm = $member->images()->whereIsApproved(true)->orderBy('sort_order')->limit(1)->first()->getFirstMediaUrl('profile_images', 'sm') ?: asset('images/placeholder.png');
                        @endphp
                            <!-- profile Image -->
                        <div class="w-full h-80 mb-4 overflow-hidden md:hidden">
                            <img src="{{ $md }}" alt="{{ $member->first_name }}"
                                 class="w-full h-80 object-cover transition-transform duration-200 hover:scale-110">
                        </div>
                        <div class="w-full h-80 mb-4 overflow-hidden hidden md:block">
                            <img src="{{ $sm }}" alt="{{ $member->first_name }}"
                                 class="w-full h-80 object-cover transition-transform duration-200 hover:scale-110">
                        </div>

                        <!-- Action Icons: -->
                        <div class="absolute -bottom-3 right-2 flex space-x-2 z-10">
                            @auth
                                <!-- Message Icon -->
                                <a href="javascript:void(0);"
                                   class="w-12 h-12 shadow-lg rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110"
                                   style="background-color: #24c43e;">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                              d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.678 3.348-3.97z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </a>

                                <!-- Heart Icon (Solid) -->
                                <a href="javascript:void(0);"
                                   class="w-12 h-12 bg-pink-600 bg-opacity-80 hover:bg-opacity-100 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
                                    </svg>
                                </a>

                                <!-- Heart Icon (Outline) -->
                                <a href="javascript:void(0);"
                                   class="w-12 h-12 bg-pink-600 bg-opacity-80 hover:bg-opacity-100 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                                    </svg>
                                </a>
                            @endauth

                            @cookieguest
                            <!-- Message Icon -->
                            <a href="{{ route('register-prompt') }}"
                               class="w-12 h-12 shadow-lg rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110"
                               style="background-color: #24c43e;">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                          d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.678 3.348-3.97z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>

                            <!-- Heart Icon (Outline) -->
                            <a href="{{ route('register-prompt') }}"
                               class="w-12 h-12 bg-pink-600 bg-opacity-80 hover:bg-opacity-100 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                                </svg>
                            </a>
                            @endcookieguest
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-lg font-bold">{{ $member->first_name }}</p>
                        <p>{{ $member->profile->age }}, {{ $member->profile->city }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 dark:text-gray-400">No profiles found.</p>
            @endforelse
            @auth
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
            @else
                <p><a href="{{ route('register-prompt') }}">Register</a> to view more profiles</p>
            @endauth
        </div>
    </div>
    <x-modal name="breeze-modal" :title="__('Filters')" :show-buttons="true">
        <div class="p-6">
            Test modal content
        </div>

        <x-primary-button :classes="'btn-primary'" wire:click.prevent="applyFilters">
            {{ __('Apply') }}
        </x-primary-button>
    </x-modal>
</div>
