<?php

namespace App\Livewire\Pages\Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\MemberService;
use Livewire\Component;
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
    public float $lon;
    public array $buttons = [];
    public array $icons = [];
    public int $distance;
    public string $distanceStr;
    public bool $isMiles = true;

    public function boot(MemberRepository $memberRepository, MemberService $service)
    {
        $this->memberRepository = $memberRepository;
        $this->service = $service;
    }

    public function mount()
    {
        $this->getPreferences();

        if (session('viewed_profiles')) {
            $this->viewedProfiles = session('viewed_profiles');
        }

        if (session('current_profile')) {
            $this->member = User::query()->with(['profile', 'images'])->whereId(session('current_profile'))->first();
        } else {
            $this->member = $this->memberRepository->nextMemberDiscover($this->minAge, $this->maxAge, $this->lat, $this->lon, $this->preference, $this->viewedProfiles, $this->isMiles);
            session()->put('current_profile', $this->member->id);
        }
        $this->viewedProfiles[] = $this->member->id;
        session()->put('viewed_profiles', $this->viewedProfiles);

        $this->fetchImages();
        $this->buttons = $this->service->fetchMainPills($this->member->id);
        $this->getMemberDistance();

        $this->isMiles = config('app.distance') === 'M';
    }

    private function getPreferences(): void
    {
        $this->preference = Cache::remember('user.' . Auth::user()->id . '.sexual_preference', now()->addDay(), fn() => Auth::user()->profile->sexual_preference);
        $this->minAge = Cache::remember('user.' . Auth::user()->id . '.min_age', now()->addDay(), fn() => Auth::user()->profile->min_age);
        $this->maxAge = Cache::remember('user.' . Auth::user()->id . '.max_age', now()->addDay(), fn() => Auth::user()->profile->max_age);
        $this->lat = Cache::remember('user.' . Auth::user()->id . '.lat', now()->addDay(), fn() => Auth::user()->profile->latitude);
        $this->lon = Cache::remember('user.' . Auth::user()->id . '.lon', now()->addDay(), fn() => Auth::user()->profile->longitude);
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

        $this->member = $this->memberRepository->nextMemberDiscover($this->minAge, $this->maxAge, $this->lat, $this->lon, $this->preference, $this->viewedProfiles, $this->isMiles);

        $this->member->refresh();
        session()->put('current_profile', $this->member->id);
        $this->member->load('images');
        $this->fetchImages();
        $this->buttons = $this->service->fetchMainPills($this->member->id);
        $this->getMemberDistance();
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

    public function like()
    {
        //add to likes
        $this->viewedProfiles[] = $this->member->id;
        session()->put('viewed_profiles', $this->viewedProfiles);
        $this->fetchProfile();
    }

    public function decline()
    {
        //add to declines
        $this->viewedProfiles[] = $this->member->id;
        session()->put('viewed_profiles', $this->viewedProfiles);
        $this->fetchProfile();
    }

    public function message()
    {
        //check if subscribed
        return redirect()->route('subscribe');
    }

    public function render()
    {
        return view('livewire.pages.auth.discover');
    }
}
