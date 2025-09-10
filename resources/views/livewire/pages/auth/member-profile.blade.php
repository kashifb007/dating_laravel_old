<?php

use App\Models\Guest;
use App\Models\User;
use App\Repositories\MemberRepository;
use Illuminate\Support\Facades\Cache;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {
    public User $member;
    public array $images = [];
    public array $viewedProfiles = [];
    private MemberRepository $memberRepository;
    private ?bool $preference = null;
    public int $age;

    public function boot(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function mount()
    {
        $this->getPreference();
        $this->fetchImages();
    }

    private function getPreference(): void
    {
        if (auth()->check()) {
            $this->preference = Cache::remember('user.' . auth()->user()->id . '.sexual_preference', now()->addDay(), static fn() => auth()->user()->profile->sexual_preference);
        } else {
            $this->preference = Cache::remember('guest.' . session('guest_id') . '.sexual_preference', now()->addDay(), static fn() => Guest::whereId(session('guest_id'))->first()->sexual_preference);
        }
    }

    private function fetchImages(): void
    {
        $images = $this->member->images()->orderBy('sort_order')->get();

        foreach ($images as $image) {
            $this->images[] = [
                'sm' => $image->getFirstMediaUrl('profile_images', 'sm'),
                'md' => $image->getFirstMediaUrl('profile_images', 'md')
            ];
        }
    }

    public function like(): void
    {
        //
    }
}; ?>

<div x-data="{
        images: @entangle('images'),
        splide: null,
        init() {
            this.$nextTick(() => {
                this.splide = new Splide(this.$refs.splide, { perPage: 1, rewind: true });
                this.splide.mount();
            });
        },
    }">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Member Profile') }}
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
                                    <img src="{{ $image['sm'] }}" alt="placeholder image" class="sm:hidden rounded-2xl">
                                    <img src="{{ $image['md'] }}" alt="placeholder image"
                                         class="hidden sm:block rounded-2xl">
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </section>
                <div class="sm:w-1/2 px-12">
                    <h2 class="text-xl font-bold">{{ $member->first_name }}</h2>
                    <h3>Age {{ $member->profile->age }}, {{ $member->profile->city }}</h3>

                    <div class="my-4 space-y-2">
                        <flux:button variant="primary" color="zinc">Zinc</flux:button>
                        <flux:button variant="primary" color="red">Red</flux:button>
                        <flux:button variant="primary" color="orange">Orange</flux:button>
                        <flux:button variant="primary" color="amber">Amber</flux:button>
                        <flux:button variant="primary" color="yellow">Yellow</flux:button>
                        <flux:button variant="primary" color="lime">Lime</flux:button>
                    </div>

                    <div>
                        <flux:button icon="heart" variant="primary" color="green" class="cursor-pointer" wire:click.prevent="like">Like</flux:button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
