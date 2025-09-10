<?php

namespace App\Livewire\Pages\Auth;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\Guest;
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
    public float $lng;
    public bool $isMiles = true;

    public function mount(): void
    {
        $this->resetPage();
        $this->isMiles = config('app.distance') === 'M';
    }

    private function getPreferences(): void
    {
        if (auth()->check()) {
            $this->preference = Cache::remember('user.' . auth()->user()->id . '.sexual_preference', now()->addDay(), static fn() => auth()->user()->profile->sexual_preference);
            $this->minAge = Cache::remember('user.' . auth()->user()->id . '.min_age', now()->addDay(), static fn() => auth()->user()->profile->min_age);
            $this->maxAge = Cache::remember('user.' . auth()->user()->id . '.max_age', now()->addDay(), static fn() => auth()->user()->profile->max_age);
            $this->lat = Cache::remember('user.' . auth()->user()->id . '.lat', now()->addDay(), static fn() => auth()->user()->profile->latitude);
            $this->lng = Cache::remember('user.' . auth()->user()->id . '.lng', now()->addDay(), static fn() => auth()->user()->profile->longitude);
        } else {
            $this->preference = Cache::remember('guest.' . session('guest_id') . '.sexual_preference', now()->addDay(), static fn() => Guest::whereId(session('guest_id'))->first()->sexual_preference);
            $this->minAge = Cache::remember('guest.' . session('guest_id') . '.min_age', now()->addDay(), static fn() => Guest::whereId(session('guest_id'))->first()->min_age);
            $this->maxAge = Cache::remember('guest.' . session('guest_id') . '.max_age', now()->addDay(), static fn() => Guest::whereId(session('guest_id'))->first()->max_age);
            $this->lat = Cache::remember('guest.' . session('guest_id') . '.lat', now()->addDay(), static fn() => Guest::whereId(session('guest_id'))->first()->latitude);
            $this->lng = Cache::remember('guest.' . session('guest_id') . '.lng', now()->addDay(), static fn() => Guest::whereId(session('guest_id'))->first()->longitude);
        }
    }

    public function getMembersProperty()
    {
        $this->getPreferences();
        $sex = $this->preference;

        $query = User::query()
            ->with(['profile', 'images' => function($query) {
                $query->where('is_approved', 1);
            }])
            ->whereHasRole('customer')
            ->whereHas('profile', function ($q) {
                $q->whereIsActive(true)
                    ->orWhere('is_dummy', true);
                $q->where('age', '>=', $this->minAge)
                    ->where('age', '<=', $this->maxAge);
            })
            ->whereHas('images', function($query) {
                $query->where('is_approved', 1);
            })
            ->near($this->lat, $this->lng, 30, $this->isMiles)
            ->orderBy('profiles.profile_score', 'desc')
            ->orderBy('users.id');

        if ($sex !== null) {
            $query->whereHas('profile', function ($q) use ($sex) {
                $q->whereSex($sex);
            });
        }

        return $query->paginate($this->perPage);
    }

    public function loadMoreMembers(): void
    {
        if (auth()->check()) {
            $paginator = $this->members;
            if (!$paginator->hasMorePages()) {
                $this->hasMore = false;
                return;
            }

            $this->perPage += 12;
        }
    }

    public function applyFilters(): void
    {
        $this->resetPage();
        $this->perPage = 12;
        $this->getMembersProperty();
        // Close the modal after applying filters
        $this->dispatch('close-modal', 'breeze-modal');
    }

    public function render()
    {
        return view('livewire.pages.auth.search');
    }
}
