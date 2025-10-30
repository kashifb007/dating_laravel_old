<?php

use App\Actions\Customer\CitySearchAction;
use App\DataTransferObjects\NominatimDto;
use App\Models\Country;
use App\Models\Language;
use Flux\Flux;
use Livewire\Volt\Component;

new class extends Component {
    public string $oldCity = '';
    public string $city = '';
    public string $oldLocation = '';
    public string $location = '';
    public float $latitude = 0;
    public float $longitude = 0;
    public array $cityData = [];
    public string $citySearch = '';
    public ?int $selectedPlaceId = null;
    public string $poweredBy = '';
    public ?int $country_id = null;
    public ?int $language_id = null;
    public bool $isCountryDisabled = false;
    public array $countries;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->oldCity = Auth::user()->profile->city;
        $this->oldLocation = Auth::user()->profile->location;
        $locale = app()->getLocale();

        $countries = Cache::remember(key: "countries_$locale", ttl: now()->addWeek(), callback: fn() => Country::all());
        foreach ($countries as $country) {
            $this->countries[$country->id] = $country->name;
        }

        asort($this->countries);
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
            $this->latitude = (float)$selected['lat'];
            $this->longitude = (float)$selected['lon'];
            $this->location = (string)$selected['display_name'];

            //select country_id
            $this->country_id = Country::whereIso($selected['country_code'])->first()?->id ?? 0;
            $this->isCountryDisabled = $this->country_id > 0;
        }
    }

    public function saveCity()
    {
        $this->language_id = Language::firstWhere('locale', app()->getLocale())->id;

        $validated = $this->validate([
            'city' => ['required', 'string'],
            'location' => ['required', 'string'],
            'country_id' => ['required', 'int', 'exists:countries,id'],
            'language_id' => ['required', 'int', 'exists:languages,id'],
            'latitude' => ['required', 'decimal:0,10'],
            'longitude' => ['required', 'decimal:0,10'],
        ]);

        Auth::user()->profile->update($validated);
        $this->oldCity = $this->city;
        $this->oldLocation = $this->location;
        $this->selectedPlaceId = null;
        $this->citySearch = '';
        $this->cityData = [];

        Flux::toast(text: "Address Saved",
            variant: 'success');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Address') }}
        </h2>

        <p class="mt-1 mb-2 text-base text-gray-600 dark:text-gray-400">
            {{ __("Current location.") }}
        </p>
    </header>

    <div class="space-y-2">
        <div>
            <p class="text-gray-600 dark:text-gray-400 text-base"><span>City</span> - <span class="text-white">{{ $oldCity }}</span></p>
            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4"><span>Approximate location</span>
                - {{ $oldLocation }}</p>
            <flux:separator/>
        </div>

        <div>
            <p class="text-base font-bold mt-4 mb-2">Update your location</p>
            <x-input-label class="mb-2" for="city_select" :value="__('ui.your_town')"/>
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

        <div class="mb-6 mt-4">
            <x-input-label class="mb-2" for="country" :value="__('ui.country')"/>
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

        <div wire:loading.remove class="h-8">
            <flux:button wire:click="saveCity" class="cursor-pointer" variant="primary" color="zinc">{{ __('ui.save') }}</flux:button>
        </div>
        <div wire:loading class="h-8">
            <flux:icon.loading/>
        </div>
    </div>

</section>
