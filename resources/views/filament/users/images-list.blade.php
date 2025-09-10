@php /** @var \App\Models\User|null $record */ @endphp
<x-filament::section>
    {{-- Just mount the Livewire component and pass the record --}}
    <livewire:pages.admin.customer.images :user="$record" />
</x-filament::section>
