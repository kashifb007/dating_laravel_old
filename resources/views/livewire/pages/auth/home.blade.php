<?php

use App\Actions\Customer\CitySearchAction;
use App\DataTransferObjects\ProfileDto;
use App\DataTransferObjects\NominatimDto;
use App\Models\Country;
use App\Models\Guest;
use App\Models\Language;
use App\Models\User;
use App\Support\Ip;
use Flux\Flux;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public bool $sex = false;
    public ?bool $interestedIn = null;
    public int $fromAge = 35;
    public int $toAge = 45;
    public ?int $country_id = null;
    public int $language_id = 0;
    public string $citySearch = '';
    public string $city = '';
    public float $lat = 0;
    public float $lon = 0;
    public string $poweredBy = '';
    public string $location = '';
    public array $cityData = [];
    public int $interestedInDropdown;
    public array $ages;
    public array $countries;
    public ?string $selectedPlaceId = null;
    public bool $isCountryDisabled = false;

    public function mount()
    {
        $this->interestedInDropdown = 0;
        $this->ages = range(18, 100);
        $locale = app()->getLocale();
        $countries = Cache::remember(key: "countries_$locale", ttl: now()->addWeek(), callback: fn() => Country::all());
        foreach ($countries as $country) {
            $this->countries[$country->id] = $country->name;
        }

        asort($this->countries);

        if (session()->has('profile_data')) {
            $this->sex = session('profile_data')['sex'];
            $this->fromAge = session('profile_data')['fromAge'];
            $this->toAge = session('profile_data')['toAge'];
            $this->city = session('profile_data')['city'];
            $this->location = session('profile_data')['location'];
            $this->citySearch = session('profile_data')['location'];
            $this->lat = session('profile_data')['lat'];
            $this->lon = session('profile_data')['lon'];
            $this->country_id = session('profile_data')['country_id'];
            $this->isCountryDisabled = true;
        }
    }

    public function clear()
    {
        Flux::toast(
            text: __('notification.data_clear'),
        );
        $this->resetErrorBag();
        $this->fromAge = 35;
        $this->toAge = 45;
        $this->citySearch = '';
        $this->city = '';
        $this->lat = 0;
        $this->lon = 0;
        $this->location = '';
        $this->country_id = null;
        $this->isCountryDisabled = false;
        $this->selectedPlaceId = null;
        session()->forget('profile_data');
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $this->sex = in_array($this->interestedInDropdown, [0, 2, 4], true);

        if (in_array($this->interestedInDropdown, [0, 3], true)) {
            //women
            $this->interestedIn = false;
        } elseif (in_array($this->interestedInDropdown, [1, 2], true)) {
            //men
            $this->interestedIn = true;
        }

        $this->language_id = Language::firstWhere('locale', app()->getLocale())->id;

        $validated = $this->validate([
            'sex' => ['required', 'bool'],
            'interestedIn' => ['nullable', 'bool'],
            'fromAge' => ['required', 'int', 'min:18', 'max:100'],
            'toAge' => ['required', 'int', 'min:18', 'max:100'],
            'city' => ['required', 'string'],
            'location' => ['required', 'string'],
            'country_id' => ['required', 'int', 'exists:countries,id'],
            'language_id' => ['required', 'int', 'exists:languages,id'],
            'lat' => ['required', 'decimal:0,10'],
            'lon' => ['required', 'decimal:0,10'],
        ]);

        session()->put('profile_data', $validated);

        $this->redirect(route('register', absolute: false), navigate: true);
    }

    // Fetch options when the search text changes
    public function updatedCitySearch(string $value): void
    {
        $this->resetErrorBag('city');
        $q = trim($value);

        if (mb_strlen($q) < 3) {
            $this->cityData = [];
            return;
        }

        $locale = app()->getLocale();

        $result = new CitySearchAction()->handle(new NominatimDto(language: $locale, q: $q));

        $this->cityData = $result['data'] ?? [];

        if (isset($result['data'])) {
            $this->poweredBy = $result['powered_by'];
        }
    }

    // When user picks an option, copy lat/lon/display into your form fields
    public function updatedSelectedPlaceId($placeId): void
    {
        $selected = collect($this->cityData)->firstWhere('place_id', (int)$placeId);

        if ($selected) {
            $this->city = (string)($selected['name']);
            $this->lat = (float)$selected['lat'];
            $this->lon = (float)$selected['lon'];
            $this->location = (string)$selected['display_name'];

            //select country_id
            $this->country_id = Country::whereIso($selected['country_code'])->first()?->id ?? 0;
            $this->isCountryDisabled = $this->country_id > 0;
        }
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Interested in -->
        <div class="mt-4">
            <x-input-label for="interestedInDropdown" :value="__('ui.interested_in')"/>
            <flux:select id="interestedInDropdown" name="interestedInDropdown" size="sm" placeholder=""
                         wire:model="interestedInDropdown">
                    <flux:select.option value="0">{{ __('orientation.male_straight') }}</flux:select.option>
                    <flux:select.option value="1">{{ __('orientation.female_straight') }}</flux:select.option>
                    <flux:select.option value="2">{{ __('orientation.male_gay') }}</flux:select.option>
                    <flux:select.option value="3">{{ __('orientation.female_gay') }}</flux:select.option>
                    <flux:select.option value="4">{{ __('orientation.male_bi') }}</flux:select.option>
                    <flux:select.option value="5">{{ __('orientation.female_bi') }}</flux:select.option>
            </flux:select>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>

        <!-- Age -->
        <div class="mt-4">
            <x-input-label for="from_age" :value="__('ui.between_ages')"/>
            <flux:select id="from_age" name="from_age" size="sm" placeholder=""
                         wire:model="fromAge">
                @foreach ($ages as $value)
                    <flux:select.option value="{{ $value }}">{{ $value }}</flux:select.option>
                @endforeach
            </flux:select>
        </div>
        <div class="mt-2">
            <x-input-label for="to_age" :value="__('ui.and')"/>
            <flux:select id="to_age" name="to_age" size="sm" placeholder=""
                         wire:model="toAge">
                @foreach ($ages as $value)
                    <flux:select.option value="{{ $value }}">{{ $value }}</flux:select.option>
                @endforeach
            </flux:select>
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="city_select" :value="__('ui.your_town')"/>
            <flux:select
                variant="combobox"
                id="city_select"
                :filter="false"
                clearable
                placeholder="{{ __('ui.enter_city') }}"
                wire:model="selectedPlaceId"
            >
                <x-slot name="input">
                    <flux:select.input
                        id="city"
                        wire:model.live.debounce.1s="citySearch"
                        placeholder="{{ __('ui.city_name') }}"
                    />
                </x-slot>

                @forelse ($this->cityData as $row)
                    <flux:select.option
                        value="{{ $row['place_id'] ?? $loop->index }}"
                        wire:key="city-{{ $row['place_id'] ?? $loop->index }}"
                    >
                        {{ $row['display_name'] }}
                    </flux:select.option>
                @empty
                    @if (mb_strlen($this->citySearch) >= 3)
                        <flux:select.option disabled>No results</flux:select.option>
                    @endif
                @endforelse
                @if (count($this->cityData))
                    <flux:select.option
                        value="__attrib__"
                        disabled
                        class="cursor-default select-none opacity-70"
                    >
                        <span class="sr-only">{{ $this->citySearch }}</span>
                        {{ $this->poweredBy }}
                    </flux:select.option>
                @endif
            </flux:select>
            <x-input-error :messages="$errors->get('city')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <x-input-label for="country" :value="__('ui.country')"/>
            <flux:select variant="listbox" searchable id="country" placeholder="{{ __('ui.choose_country') }}"
                         wire:model.live="country_id"
                         :disabled="$isCountryDisabled"
            >
                @forelse ($this->countries as $key => $row)
                    <flux:select.option
                        value="{{ $key ?? $loop->index }}"
                        wire:key="country-{{ $key ?? $loop->index }}"
                    >
                        {{ $row }}
                    </flux:select.option>
                @empty
                @endforelse
            </flux:select>
            <x-input-error :messages="$errors->get('country_id')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <div class="flex items-center justify-between w-full">
                <x-secondary-button wire:click.prevent="clear">
                    {{ __('ui.clear') }}
                </x-secondary-button>
                <x-primary-button>
                    {{ __('ui.continue') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</div>
