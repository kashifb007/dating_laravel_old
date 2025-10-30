<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Guest;
use App\Models\ProfileCategory;
use App\Models\ProfileChoice;
use App\Models\ProfileQuestion;
use App\Models\User;
use App\Repositories\MemberRepository;
use App\Services\MemberService;
use Illuminate\Support\Facades\Cache;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {
    public User $member;
    public array $images = [];
    private MemberRepository $memberRepository;
    private ?bool $preference = null;
    public int $age;
    public array $buttons = [];
    public array $icons = [];
    public int $distance;
    public string $distanceStr;
    public bool $isMiles = true;
    public float $lat;
    public float $lon;

    public function boot(MemberRepository $memberRepository, MemberService $service)
    {
        $this->memberRepository = $memberRepository;
        $this->service = $service;
    }

    public function mount()
    {
        $this->getPreference();
        $this->fetchImages();
        $this->buttons = $this->service->fetchMainPills($this->member->id);
        $this->getMemberDistance();
        $this->getAboutMePillsProperty();
    }

    /**
     * text answers
     * @return array
     */
    public function getMyAnswersProperty(): array
    {
        $myAnswersCollection = ProfileCategory::query()
            ->with([
                'profileQuestions' => function ($query) {
                    $query->select('id', 'profile_category_id', 'name', 'sort_order')
                        ->orderBy('sort_order', 'ASC');
                },
                'profileQuestions.profileAnswers' => function ($query) {
                    $query->where('user_id', $this->member->id);
                }
            ])
            ->whereSlug('my-answers')
            ->get();

        $myAnswers = [];

        foreach ($myAnswersCollection as $category) {
            foreach ($category->profileQuestions as $question) {
                if ($question->profileAnswers->isEmpty()) {
                    continue;
                }

                $answer = $question->profileAnswers->first();

                $myAnswers[] = [
                    'question' => $question->name,
                    'answer' => $answer->answer,
                ];
            }
        }

        return $myAnswers;
    }

    /**
     * about me text
     * @return string
     */
    public function getAboutMeProperty()
    {
        $aboutMe = ProfileCategory::query()
            ->with(['profileQuestions.profileAnswers' => function ($query) {
                $query->where('user_id', $this->member->id)
                    ->whereHasMorph('answerable', [ProfileQuestion::class]);
            }])
            ->where('slug', 'my-description')
            ->first();

        return $aboutMe->profileQuestions->first()->profileAnswers->first()->answer ?? '';
    }

    public function getAboutMePillsProperty(): array
    {
        $categories = ProfileCategory::query()
            ->with(['profileQuestions.profileChoices.profileAnswers' => function ($query) {
                $query->where('user_id', $this->member->id)
                    ->whereHasMorph('answerable', [ProfileChoice::class]);
            }])
            ->where('slug', 'about-me')
            ->get();

        $questions = [];
        $index = 0;

        $categoryName = $categories->first()->name ?? '';

        foreach ($categories as $category) {
            foreach ($category->profileQuestions as $question) {
                $questions[$index]['category'] = $categoryName;
                $questions[$index]['question'] = $question->name;

                $choices = $question->profileChoices;
                foreach ($choices as $choice) {
                    $answers = $choice->profileAnswers;

                    foreach ($answers as $answer) {
                        if ($answer->answerable_type === ProfileChoice::class) {
                            $choice = ProfileChoice::find($answer->answerable_id);
                            if ($choice) {
                                $questions[$index]['answers'][] = $choice->name;
                            }
                        }
                    }
                }
                $index++;
            }
        }

        return $questions;
    }

    public function getHobbiesProperty(): array
    {
        return $this->getPills('my-hobbies');
    }

    public function getHomeLifeProperty(): array
    {
        return $this->getPills('home-life');
    }

    public function getLookingForProperty(): array
    {
        $category = ProfileCategory::query()
            ->where('slug', 'i-am-looking-for')
            ->first();

        $minAge = $this->member->profile->min_age;
        $maxAge = $this->member->profile->max_age;

        return [
            'category' => $category->name ?? '',
            'min_age' => $minAge ?? null,
            'max_age' => $maxAge ?? null
        ];
    }

    public function getPills(string $slug): array
    {
        $categories = ProfileCategory::query()
            ->with(['profileQuestions.profileChoices.profileAnswers' => function ($query) {
                $query->where('user_id', $this->member->id)
                    ->whereHasMorph('answerable', [ProfileChoice::class]);
            }])
            ->where('slug', $slug)
            ->get();

        $questions = [];
        $index = 0;

        $categoryName = $categories->first()->name ?? '';

        foreach ($categories as $category) {
            foreach ($category->profileQuestions as $question) {
                $questions[$index]['category'] = $categoryName;
                $questions[$index]['question'] = $question->name;
                $questions[$index]['show_question'] = $question->show_question;

                $choices = $question->profileChoices;
                foreach ($choices as $choice) {
                    $answers = $choice->profileAnswers;

                    foreach ($answers as $answer) {
                        if ($answer->answerable_type === ProfileChoice::class) {
                            $choice = ProfileChoice::find($answer->answerable_id);
                            if ($choice) {
                                $questions[$index]['answers'][] = $choice->name;
                            }
                        }
                    }
                }
                $index++;
            }
        }
        return $questions;
    }

    private function getPreference(): void
    {
        $this->preference = Cache::remember('user.' . Auth::user()->id . '.sexual_preference', now()->addDay(), static fn() => Auth::user()->profile->sexual_preference);
        $this->lat = Cache::remember('user.' . Auth::user()->id . '.lat', now()->addDay(), fn() => Auth::user()->profile->latitude);
        $this->lon = Cache::remember('user.' . Auth::user()->id . '.lon', now()->addDay(), fn() => Auth::user()->profile->longitude);
    }

    private function getMemberDistance()
    {
        $this->distance = Cache::remember('user.' . Auth::user()->id . '-' . $this->member->id . '.distance', now()->addDay(), fn() => $this->service->getMileage($this->lat, $this->lon, $this->member->profile->latitude, $this->member->profile->longitude, $this->isMiles));

        if ($this->distance < 5) {
            $this->distanceStr = $this->isMiles ? __('< than 5 miles') : __('< than 5 km');
        } else {
            $this->distanceStr = $this->isMiles ? sprintf("%d %s", $this->distance, __('miles')) : sprintf("%d %s", $this->distance, __('km'));
        }
    }

    private function fetchImages(): void
    {
        $images = $this->member->images()->where('is_approved', true)->orderBy('sort_order')->get();

        foreach ($images as $image) {
            $this->images[] = [
                'sm' => $image->getFirstMediaUrl('profile_images', 'sm'),
                'md' => $image->getFirstMediaUrl('profile_images', 'md')
            ];
        }
    }

    public function like(): void
    {
        if ($this->member->id === Auth::id()) {
            return;
        }
    }

    public function message()
    {
        if ($this->member->id === Auth::id()) {
            return;
        }
        //check if subscribed
        return redirect()->route('subscribe');
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
            {{ __('ui.member_profile') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center w-full">
        <div
            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl w-full md:w-2/3 sm:mx-12 md:mx-0">
            <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col sm:flex-row justify-center">
                <div class="w-full sm:w-1/2">
                    @if (count($images))
                        <section x-ref="splide" class="splide px-14" aria-label="Member Images"
                                 wire:key="splide-{{ data_get($member, 'id', 'none') }}">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @forelse ($images as $idx => $image)
                                        <li class="splide__slide flex flex-col items-center justify-center pb-8"
                                            wire:key="slide-{{ $member->id }}-{{ $idx }}">
                                            <img src="{{ $image['sm'] }}" alt="placeholder image"
                                                 class="sm:hidden rounded-2xl">
                                            <img src="{{ $image['md'] }}" alt="placeholder image"
                                                 class="hidden sm:block rounded-2xl">
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </section>
                    @endif
                </div>
                <div class="sm:w-1/2 px-12">
                    <h2 class="text-xl font-bold">{{ $member->first_name }}</h2>
                    <h3>{{ __('ui.age') }} {{ $member->profile->age }}, {{ $member->profile->city }}</h3>

                    <div class="mt-4 space-y-2">
                        <flux:button icon="map-pin" class="mr-2"
                                     title="{{ __('ui.distance') }}">{{ $distanceStr }}</flux:button>
                        @foreach($buttons as $button)
                            <flux:button class="mr-2"
                                         icon="{{ $button->icon }}"
                                         title="{{ $button->question }}">{{ $button->answer }}</flux:button>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <flux:button icon="heart" variant="primary" color="pink" class="cursor-pointer"
                                     wire:click.prevent="like">{{ __('ui.like') }}
                        </flux:button>
                        <flux:button icon="chat-bubble-left" variant="primary" color="green" class="ml-2 cursor-pointer"
                                     wire:click.prevent="message">{{ __('ui.message') }}
                        </flux:button>
                    </div>

                    <div class="mt-4">
                        <p>{{ __('ui.last_online') }} {{ $member->last_logged_in_at->diffForHumans() }}</p>
                    </div>

                    {{--                Profile Questions--}}
                    <div class="mt-4 space-y-4">
                        @foreach($this->myAnswers as $qa)
                            <div>
                                <p class="font-semibold text-rose-600 dark:text-rose-300 text-sm">"{{ $qa['question'] }}
                                    "</p>
                                <p class="font-bold">{{ $qa['answer'] }}</p>
                            </div>
                        @endforeach
                    </div>

                    {{--                About Me--}}
                    @if($this->aboutMePills[0])
                        <div class="mt-4">
                            <h3 class="text-md font-bold">{{ $this->aboutMePills[0]['category'] }}</h3>
                            <p>{{ $this->aboutMe }}</p>
                            {{--                About Me Pills--}}
                            <div class="mt-2">
                                <p class="font-bold">{{ $this->aboutMePills[0]['category'] }}</p>
                                <div class="flex flex-wrap mt-2">
                                    @foreach($this->aboutMePills as $qa)
                                        @foreach($qa['answers'] as $answer)
                                            <span
                                                class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium mr-2 mb-2 px-3 py-1 rounded-full">{{ $answer }}</span>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($this->homeLife[0])
                        <div class="mt-4">
                            <p class="font-bold">{{ $this->homeLife[0]['category'] }}</p>
                            @foreach($this->homeLife as $qa)
                                @if (isset($qa['answers']))
                                    <p class="my-2 flex flex-wrap"> @if($qa['show_question']){{ $qa['question'] }}@endif
                                        @foreach($qa['answers'] as $answer)
                                            <span
                                                class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium mx-1 mb-2 px-3 py-1 rounded-full">{{ $answer }}</span>
                                        @endforeach
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if($this->hobbies[0])
                        <div class="mt-4">
                            <p class="font-bold">{{ $this->hobbies[0]['category'] }}</p>
                            @foreach($this->hobbies as $qa)
                                @if (isset($qa['answers']))
                                    <p class="my-2 flex flex-wrap"> @if($qa['show_question']){{ $qa['question'] }}@endif
                                        @foreach($qa['answers'] as $answer)
                                            <span
                                                class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium mx-1 mb-2 px-3 py-1 rounded-full">{{ $answer }}</span>
                                        @endforeach
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if($this->lookingFor)
                        <div class="mt-4">
                            <p class="font-bold mb-2">{{ $this->lookingFor['category'] }} <span class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium px-3 py-1 rounded-full">{{ __('ui.age') }}: {{ $this->lookingFor['min_age'] }} - {{ $this->lookingFor['max_age'] }}</span></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
