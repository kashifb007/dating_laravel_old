<?php

use App\Actions\Customer\FetchImagesAction;
use App\DataTransferObjects\FetchImagesDto;
use App\Models\Image;
use App\Services\MemberPhotoService;
use Livewire\Volt\Component;
use Livewire\Attributes\On;

new class extends Component {
    public int $userId;
    public int $uploadedImagesCount = 0;
    public int $maxImagesCount = 0;
    public array $images = [];
    private MemberPhotoService $memberPhotoService;

    public function boot(MemberPhotoService $memberPhotoService): void
    {
        $this->memberPhotoService = $memberPhotoService;
    }

    public function mount(): void
    {
        $this->userId = Auth::id();
        $this->fetchImages();
        $this->maxImagesCount = config('filesystems.max_files');
    }

    private function fetchImages(): void
    {
        $this->images = [];
        $dto = new FetchImagesDto(null);
        $images = $this->memberPhotoService->fetchImages(new FetchImagesAction($dto::fromAppRequest()->userId));
        $this->images = $images[0] ?? [];
        $this->uploadedImagesCount = $images[1] ?? 0;
    }

    #[On('photos-uploaded')]
    public function updatePhotos(int $userId): void
    {
        if ($userId === $this->userId) {
            $this->fetchImages();
        }
    }

    public function deleteImage(int $imageId): void
    {
        $deleteImage = $this->memberPhotoService->deleteImage($this->userId, $imageId);
        $this->fetchImages();
    }

    public function reorderImages(string $draggedKey, string $targetKey): void
    {
        $reOrdered = $this->memberPhotoService->reorderImages($this->userId, $draggedKey, $targetKey);
        $this->fetchImages();
    }

    public function moveUp(int $imageId): void
    {
        $moveUp = $this->memberPhotoService->moveUp($this->userId, $imageId);
        $this->fetchImages();
    }

    public function moveDown(int $imageId): void
    {
        $moveDown = $this->memberPhotoService->moveDown($this->userId, $imageId, $this->uploadedImagesCount);
        $this->fetchImages();
    }

    public function viewProfile()
    {
        return redirect()->route('member.profile', ['member' => $this->userId]);
    }
}; ?>

<section>
    <header>
        <div class="flex w-full justify-between">
            <div class="max-w-md">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('My Pictures') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Update your photos.") }}
                </p>
            </div>
            <div>
                <flux:button variant="primary" color="lime" class="hover:cursor-pointer" wire:click="viewProfile">View
                    profile
                </flux:button>
            </div>
        </div>
    </header>

    <div class="mt-6">
        @if ($uploadedImagesCount < config('filesystems.max_files'))
            <livewire:pages.profile.components.filepond :userId="$userId" :uploadedImagesCount="$uploadedImagesCount"
                                                        wire:key="photos_{{$uploadedImagesCount}}"/>
        @endif
    </div>
    @if ($uploadedImagesCount)
        <div class="mt-6">
            <div class="flex">
                <h3 class="text-md font-medium text-gray-900 dark:text-gray-100">Your Images</h3>
                <div wire:loading class="h-6 ml-2">
                    <flux:icon.loading/>
                </div>
            </div>
            <div class="mt-2 flex flex-col" drag-root>
                @forelse ($images as $image)
                    <div class="flex space-x-4 items-center" drag-item draggable="true" wire:key="{{ $image['id'] }}">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-move" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16"/>
                            </svg>
                        </span>

                        <img src="{{ $image['sm'] }}" alt="placeholder image"
                             class="rounded-lg w-24 h-24 object-cover my-2 mr-4">
                        <span>{{ $image['created_at'] }}</span>
                        <div class="flex flex-col gap-2" wire:loading.remove>
                            @if($image['sort_order'] > 0 && $uploadedImagesCount > 1)
                                <a href="javascript:void(0)" title="Move up" wire:click="moveUp({{$image['id']}})">
                                    <flux:icon.arrow-long-up/>
                                </a>
                            @endif
                            @if($image['sort_order'] + 1 < $uploadedImagesCount && $uploadedImagesCount > 1)
                                <a href="javascript:void(0)" title="Move down" wire:click="moveDown({{$image['id']}})">
                                    <flux:icon.arrow-long-down/>
                                </a>
                            @endif
                        </div>
                        @if ($image['approved'])
                            <span
                                class="text-sm font-medium px-3 py-1 rounded-full bg-green-600 text-white dark:text-white"
                                title="approved by admin">approved
                            </span>
                        @else
                            <span
                                class="text-sm font-medium px-3 py-1 rounded-full bg-rose-600 text-white dark:text-white"
                                title="not yet approved by admin">not approved
                            </span>
                        @endif
                        <div wire:loading.remove><a href="javascript:void(0)" title="Delete photo"
                                                    wire:click="deleteImage({{$image['id']}})">
                                <flux:icon.trash/>
                            </a></div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    @endif

    @script
    <script>
        let root = document.querySelector('[drag-root]');
        root.querySelectorAll('[drag-item]').forEach(el => {
            el.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('text/plain', e.target.getAttribute('wire:key'));
                e.dataTransfer.effectAllowed = 'move';
            });

            el.addEventListener('dragover', (e) => {
                e.preventDefault();
                e.dataTransfer.dropEffect = 'move';
            });

            el.addEventListener('drop', (e) => {
                e.preventDefault();
                const draggedKey = e.dataTransfer.getData('text/plain');
                const targetKey = e.target.closest('[drag-item]').getAttribute('wire:key');

                if (draggedKey && targetKey && draggedKey !== targetKey) {
                    $wire.reorderImages(draggedKey, targetKey);
                }
            });
        });
    </script>
    @endscript
</section>
