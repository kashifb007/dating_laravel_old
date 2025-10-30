<div class="grid gap-3 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 justify-items-center my-4">
    @forelse ($media as $image)
        <span class="items-center gap-3 shrink-0">
            <a href="{{ $image['large'] }}" title="{{ $image['filename'] }}" target="_blank">
                <img
                    src="{{ $image['small'] }}"
                    alt="{{ $image['filename'] }}"
                    class="rounded-md object-cover"
                />
            </a>
            <div class="flex flex-col space-y-2">
                <span class="text-sm text-gray-700 dark:text-gray-300 whitespace-nowrap">{{ $image['created_at'] }}</span>

                {{-- Approve toggle (isApproved) --}}
                <flux:switch
                    size="sm"
                    wire:model.live="isApproved.{{ $image['id'] }}"
                    :label="$image['is_approved'] ? 'Approved' : 'Approve?'"
                    class="my-4"
                />

                <x-filament::button
                    color="danger"
                    size="sm"
                    icon="heroicon-m-trash"
                    wire:confirm="Are you sure you wish to delete this image?"
                    wire:click="deleteImage({{ $image['id'] }})"
                    wire:loading.attr="disabled"
                    wire:target="deleteImage"
                >
                    {{ __('Delete') }}
                </x-filament::button>
            </div>
        </span>
    @empty
        <div class="text-sm text-gray-700 dark:text-gray-300">No images.</div>
    @endforelse
</div>

