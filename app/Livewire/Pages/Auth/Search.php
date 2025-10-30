<?php

namespace App\Livewire\Pages\Auth;

use Illuminate\Support\Facades\Auth;
use Flux\Flux;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public array $currentMembers = [];
    public int $perPage = 12;
    public bool $hasMore = true;
    private ?bool $preference = null;
    public int $minAge;
    public int $maxAge;
    public float $lat;
    public float $lon;
    public bool $isMiles = true;
    public bool $isOnline = false;
    public bool $isVerified = false;
    public int $distance = 30;
    public string $distanceStr = 'miles';

    public function mount(): void
    {
        $this->resetPage();
        $this->isMiles = config('app.distance') === 'M';
        $this->distanceStr = $this->isMiles ? 'miles' : 'km';
    }

    private function getPreferences(): void
    {
        $this->preference = Cache::remember('user.' . Auth::user()->id . '.sexual_preference', now()->addDay(), static fn() => Auth::user()->profile->sexual_preference);
        $this->minAge = Cache::remember('user.' . Auth::user()->id . '.min_age', now()->addDay(), static fn() => Auth::user()->profile->min_age);
        $this->maxAge = Cache::remember('user.' . Auth::user()->id . '.max_age', now()->addDay(), static fn() => Auth::user()->profile->max_age);
        $this->lat = Cache::remember('user.' . Auth::user()->id . '.lat', now()->addDay(), static fn() => Auth::user()->profile->latitude);
        $this->lon = Cache::remember('user.' . Auth::user()->id . '.lon', now()->addDay(), static fn() => Auth::user()->profile->longitude);
        $this->distance = Cache::remember('user.' . Auth::user()->id . '.distance', now()->addDay(), static fn() => Auth::user()->profile->distance);
    }

    public function getMembersProperty()
    {
        $this->getPreferences();
        $sex = $this->preference;

        return User::query()
            ->with(['profile', 'images' => function($query) {
                $query->where('is_approved', 1);
            }])
            ->whereHasRole('customer')
            ->whereHas('profile', function ($q) {
                $q->where(function($query) {
                    $query->whereIsActive(true)
                        ->orWhere('is_dummy', true);
                })
                    ->where('age', '>=', $this->minAge)
                    ->where('age', '<=', $this->maxAge);
            })
            ->whereHas('images', function($query) {
                $query->where('is_approved', 1);
            })
            ->when(
                $sex !== null,
                fn($q) => $q->whereHas('profile', function ($q) use ($sex) {
                    $q->whereSex($sex);
                })
            )
            ->near($this->lat, $this->lon, $this->distance, $this->isMiles)
            ->orderBy('users.id')
            ->paginate($this->perPage);
    }

    public function loadMoreMembers(): void
    {
        $paginator = $this->members;
        if (!$paginator->hasMorePages()) {
            $this->hasMore = false;
            return;
        }

        $this->perPage += 12;
    }

    public function updateFilters()
    {
        Auth::user()->profile->min_age = $this->minAge;
        Auth::user()->profile->max_age = $this->maxAge;
        Auth::user()->profile->distance = $this->distance;
        Auth::user()->profile->save();

        // Update cache
        Cache::put('user.' . Auth::user()->id . '.min_age', $this->minAge, now()->addDay());
        Cache::put('user.' . Auth::user()->id . '.max_age', $this->maxAge, now()->addDay());
        Cache::put('user.' . Auth::user()->id . '.distance', $this->distance, now()->addDay());
    }

    public function applyFilters(): void
    {
        $this->resetPage();
        $this->updateFilters();
        $this->perPage = 12;
        $this->getMembersProperty();
        $this->hasMore = true;

        $this->dispatch('close-modal', 'breeze-modal');
    }

    public function getLikesProperty()
    {
        return Auth::user()->likes()->pluck('member_id')->toArray();
    }

    public function addLike(int $memberId, string $memberName)
    {
        if (!in_array($memberId, $this->likes)) {
            Auth::user()->likes()->attach($memberId);
            Flux::toast(text: "You liked {$memberName}",
                variant: 'success');

            $this->dispatch('likes-updated', $this->likes);
        }
    }

    public function removeLike(int $memberId, string $memberName)
    {
        if (in_array($memberId, $this->likes)) {
            Auth::user()->likes()->detach($memberId);
            Flux::toast(text: "You unliked {$memberName}",
                variant: 'danger');

            $this->dispatch('likes-updated', $this->likes);
        }
    }

    public function resetFilter()
    {
        Flux::toast(text: "Reset",
            variant: 'success');
    }

    public function render()
    {
        return view('livewire.pages.auth.search');
    }
}
