<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use App\Services\MemberService;
use Livewire\Component;
use App\Models\Guest;
use App\Repositories\MemberRepository;
use Illuminate\Support\Facades\Cache;

class Discover extends Component
{
    public User $member;
    public array $images = [];
    public array $viewedProfiles = [];
    private MemberRepository $memberRepository;
    private MemberService $service;
    private ?bool $preference = null;
    public int $minAge;
    public int $maxAge;
    public float $lat;
    public float $lng;
    public array $buttons = [];
    public array $icons = [];
    public int $distance;
    public string $distanceStr;
    public bool $isMiles = true;
    public int $profilesViewed = 0;
    public ?Guest $guest = null;

    public function boot(MemberRepository $memberRepository, MemberService $service)
    {
        $this->memberRepository = $memberRepository;
        $this->service = $service;
    }

    public function mount()
    {
        $this->getPreferences();

        if (session('guest_id')) {
            $this->guest = Guest::find(session('guest_id'));
        }

        if (session('viewed_profiles')) {
            $this->viewedProfiles = session('viewed_profiles');
        }

        if (session('current_profile')) {
            $this->member = User::query()->with(['profile', 'images'])->whereId(session('current_profile'))->first();
        } else {
            $this->member = $this->memberRepository->nextMemberDiscover($this->minAge, $this->maxAge, $this->lat, $this->lng, $this->preference, $this->viewedProfiles, $this->isMiles);
            session()->put('current_profile', $this->member->id);
        }
        $this->viewedProfiles[] = $this->member->id;
        session()->put('viewed_profiles', $this->viewedProfiles);

        $this->fetchImages();
        $this->buttons = $this->service->fetchMainPills($this->member->id);
        $this->getMemberDistance();
        $this->profilesViewed = Guest::whereId(session('guest_id'))->first()->profiles_viewed;

        $this->isMiles = config('app.distance') === 'M';
    }

    private function getPreferences(): void
    {
        if (auth()->check()) {
            $this->preference = Cache::remember('user.' . auth()->user()->id . '.sexual_preference', now()->addDay(), fn() => auth()->user()->profile->sexual_preference);
            $this->minAge = Cache::remember('user.' . auth()->user()->id . '.min_age', now()->addDay(), fn() => auth()->user()->profile->min_age);
            $this->maxAge = Cache::remember('user.' . auth()->user()->id . '.max_age', now()->addDay(), fn() => auth()->user()->profile->max_age);
            $this->lat = Cache::remember('user.' . auth()->user()->id . '.lat', now()->addDay(), fn() => auth()->user()->profile->latitude);
            $this->lng = Cache::remember('user.' . auth()->user()->id . '.lng', now()->addDay(), fn() => auth()->user()->profile->longitude);
        } else {
            $this->preference = Cache::remember('guest.' . session('guest_id') . '.sexual_preference', now()->addDay(), fn() => $this->guest->sexual_preference);
            $this->minAge = Cache::remember('guest.' . session('guest_id') . '.min_age', now()->addDay(), fn() => $this->guest->min_age);
            $this->maxAge = Cache::remember('guest.' . session('guest_id') . '.max_age', now()->addDay(), fn() => $this->guest->max_age);
            $this->lat = Cache::remember('guest.' . session('guest_id') . '.lat', now()->addDay(), fn() => $this->guest->latitude);
            $this->lng = Cache::remember('guest.' . session('guest_id') . '.lng', now()->addDay(), fn() => $this->guest->longitude);
        }
    }

    private function fetchImages(): void
    {
        $this->images = [];
        $images = $this->member->images()->whereIsApproved(true)->orderBy('sort_order')->get();

        foreach ($images as $image) {
            $this->images[] = [
                'sm' => $image->getFirstMediaUrl('profile_images', 'sm'),
                'md' => $image->getFirstMediaUrl('profile_images', 'md')
            ];
        }
    }

    private function fetchProfile(): void
    {
        $this->getPreferences();

        $this->member = $this->memberRepository->nextMemberDiscover($this->minAge, $this->maxAge, $this->lat, $this->lng, $this->preference, $this->viewedProfiles, $this->isMiles);

        $this->member->refresh();
        session()->put('current_profile', $this->member->id);
        $this->member->load('images');
        $this->fetchImages();
        $this->buttons = $this->service->fetchMainPills($this->member->id);
        $this->getMemberDistance();
    }

    private function getMemberDistance()
    {
        if (auth()->check()) {
            $this->distance = Cache::remember('user.' . auth()->user()->id . '-' . $this->member->id . '.distance', now()->addDay(), fn() => $this->service->getMileage($this->lat, $this->lng, $this->member->profile->latitude, $this->member->profile->longitude, $this->isMiles));
        } else {
            $this->distance = Cache::remember('guest.' . session('guest_id') . '-' . $this->member->id . '.distance', now()->addDay(), fn() => $this->service->getMileage($this->lat, $this->lng, $this->member->profile->latitude, $this->member->profile->longitude, $this->isMiles));
        }

        if ($this->distance < 5) {
            $this->distanceStr = $this->isMiles ? __('< than 5 miles') : __('< than 5 km');
        } else {
            $this->distanceStr = $this->distance . ' ' . $this->isMiles ? __('miles') : __('km');
        }
    }

    public function like()
    {
        if (auth()->check()) {
            //add to likes
            $this->viewedProfiles[] = $this->member->id;
            session()->put('viewed_profiles', $this->viewedProfiles);
            $this->fetchProfile();
        } else {
            if ($this->profilesViewed >= 5) {
                return redirect()->route('register-prompt');
            } else {
                $this->profilesViewed++;
                $this->guest->increment('profiles_viewed');
                $this->guest->save();

                $this->viewedProfiles[] = $this->member->id;
                session()->put('viewed_profiles', $this->viewedProfiles);
            }
            $this->fetchProfile();
        }
    }

    public function decline()
    {
        if (auth()->check()) {
            //add to declines
            $this->viewedProfiles[] = $this->member->id;
            session()->put('viewed_profiles', $this->viewedProfiles);
            $this->fetchProfile();
        } else {
            if ($this->profilesViewed >= 5) {
                return redirect()->route('register-prompt');
            } else {
                $this->profilesViewed++;
                $this->guest->increment('profiles_viewed');
                $this->guest->save();

                $this->viewedProfiles[] = $this->member->id;
                session()->put('viewed_profiles', $this->viewedProfiles);
            }
            $this->fetchProfile();
        }
    }

    public function render()
    {
        return view('livewire.pages.auth.discover');
    }
}
