<div x-data="{
        images: @entangle('images'),
        splide: null,
        init() {
            this.$nextTick(() => {
                this.splide = new Splide(this.$refs.splide, { perPage: 1, rewind: true });
                this.splide.mount();

                this.$watch('images', () => {
                    this.splide?.destroy(true);
                    this.$nextTick(() => {
                        this.splide = new Splide(this.$refs.splide, { perPage: 1, rewind: true });
                        this.splide.mount();
                    });
                });
            });
        },
    }">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Discover') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center w-full">
        <div
            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl w-full md:w-2/3 sm:mx-12 md:mx-0">
            <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col sm:flex-row justify-center">
                <section x-ref="splide" class="splide px-14 w-full sm:w-1/2" aria-label="Member Images"
                         wire:key="splide-{{ data_get($member, 'id', 'none') }}">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @forelse ($images as $idx => $image)
                                <li class="splide__slide flex flex-col items-center justify-center pb-8"
                                    wire:key="slide-{{ $member->id }}-{{ $idx }}">
                                    <img src="{{ $image['sm'] }}"
                                         alt="placeholder image"
                                         class="rounded-2xl">
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </section>
                <div class="sm:w-1/2 px-12">
                    <h2 class="text-xl font-bold">
                        @cookieguest
                        {{ $member->first_name }}
                        @endcookieguest
                        @auth
                            <a title="{{ __('View Profile') }}"
                               href="{{ route('member-profile', ['member' => $member->id]) }}"
                               wire:navigate>{{ $member->first_name }}</a>
                        @endauth
                    </h2>
                    <h3>Age {{ $member->profile->age }}, {{ $member->profile->city }}</h3>

                    <div class="my-4 space-y-2">
                            <flux:button icon="map-pin" title="{{ __('Distance') }}">{{ $distanceStr }}</flux:button>
                        @foreach($buttons as $button)
                            <flux:button icon="{{ $button->icon }}" title="{{ $button->question }}">{{ $button->answer }}</flux:button>
                        @endforeach
                    </div>

                    <div>
                        <flux:button icon="heart" variant="primary" color="green" wire:click="like"
                                     class="cursor-pointer">Like
                        </flux:button>
                        <flux:button icon="x-mark" wire:click="decline" variant="primary" color="red"
                                     class="cursor-pointer">Decline
                        </flux:button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
