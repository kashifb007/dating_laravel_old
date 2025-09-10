<?php

use App\Actions\Customer\CitySearchAction;
use App\DataTransferObjects\GuestDto;
use App\DataTransferObjects\NominatimDto;
use App\Enums\RegistrationEnum;
use App\Models\Country;
use App\Models\Guest;
use App\Models\Language;
use App\Models\User;
use App\Support\Ip;
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
    public array $options;
    public array $ages;
    public array $countries;
    public ?string $selectedPlaceId = null;
    public bool $isCountryDisabled = false;

    public function mount()
    {
        $this->options = $this->options();
        $this->interestedInDropdown = 0;
        $this->ages = range(18, 100);
        $locale = app()->getLocale();
        $countries = Cache::remember(key: "countries_$locale", ttl: now()->addDay(), callback: fn() => Country::all());
        foreach ($countries as $country) {
            $this->countries[$country->id] = $country->name;
        }

        asort($this->countries);
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

        $guestDto = new GuestDto(
            ipAddress: Ip::ipv4(request()),
            sex: $validated['sex'],
            interestedIn: $validated['interestedIn'],
            fromAge: $validated['fromAge'],
            toAge: $validated['toAge'],
            city: $validated['city'],
            location: $validated['location'],
            country_id: $validated['country_id'],
            language_id: $validated['language_id'],
            lat: $validated['lat'],
            lon: $validated['lon'],
        );

        $guest = Guest::create($guestDto->toArray());
        $guestId = (string)$guest->id;

// Cookies are encrypted by default via EncryptCookies middleware.
// Set secure attributes and make it a sliding 30-day cookie.
        Cookie::queue(
            Cookie::make(
                name: 'guest_id',
                value: $guestId,
                minutes: 60 * 24 * 30, //30 days
                path: '/',
                domain: null,
                secure: request()->isSecure(), // true in prod with HTTPS
                httpOnly: true,
                sameSite: 'lax'
            )
        );

        session()->put('guest_id', $guestId);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }

    public function options(): array
    {
        return RegistrationEnum::options();
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

        //TODO once we have locale toggle, fetch $locale from Language->code or session ('en', 'de', 'fr') for Nominatim languages
        $locale = app()->getLocale();

        $result = new CitySearchAction()->handle(new NominatimDto(language: $locale, q: $q));

        $this->cityData = $result['data'] ?? [];
        $result['powered_by'] = '';

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
            <x-input-label for="interestedInDropdown" :value="__('Who are you interested in?')"/>
            <flux:select id="interestedInDropdown" name="interestedInDropdown" size="sm" placeholder=""
                         wire:model="interestedInDropdown">
                @foreach ($options as $key => $value)
                    <flux:select.option value="{{ $key }}">{{ $value }}</flux:select.option>
                @endforeach
            </flux:select>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>

        <!-- Age -->
        <div class="mt-4">
            <x-input-label for="from_age" :value="__('Between ages:')"/>
            <flux:select id="from_age" name="from_age" size="sm" placeholder=""
                         wire:model="fromAge">
                @foreach ($ages as $value)
                    <flux:select.option value="{{ $value }}">{{ $value }}</flux:select.option>
                @endforeach
            </flux:select>
        </div>
        <div class="mt-2">
            <x-input-label for="to_age" :value="__('and')"/>
            <flux:select id="to_age" name="to_age" size="sm" placeholder=""
                         wire:model="toAge">
                @foreach ($ages as $value)
                    <flux:select.option value="{{ $value }}">{{ $value }}</flux:select.option>
                @endforeach
            </flux:select>
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="interestedInDropdown" :value="__('Your town/city')"/>
            <flux:select
                variant="combobox"
                :filter="false"
                clearable
                placeholder="Enter your city"
                wire:model="selectedPlaceId"
            >
                <x-slot name="input">
                    <flux:select.input
                        id="city"
                        wire:model.live.debounce.1s="citySearch"
                        placeholder="Start typing a city name..."
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
                        {{ $poweredBy }}
                    </flux:select.option>
                @endif
            </flux:select>
            <x-input-error :messages="$errors->get('city')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <x-input-label for="country" :value="__('Country')"/>
            <flux:select variant="listbox" searchable id="country" placeholder="Choose country..."
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

        <div class="flex items-center justify-between mt-4">
            <div>
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                   href="{{ route('register') }}" wire:navigate>
                    {{ __('Full Registration') }}
                </a>
            </div>
            <div class="flex items-center justify-end">
                <x-primary-button>
                    {{ __('View Singles') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</div>
