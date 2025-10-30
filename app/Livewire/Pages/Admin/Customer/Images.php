<?php

namespace App\Livewire\Pages\Admin\Customer;

use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Filament\Notifications\Notification;

class Images extends Component
{
    public User $user;

    /** @var array<int,bool> */
    public array $isApproved = [];

    /** @var array<int,array>  $media already provided to the view */
    public $images = [];

    public function mount(): void
    {
        $this->images = $this->user->images()->orderBy('sort_order')->get();
        // Seed toggle states from your media array
        foreach ($this->images as $img) {
            $this->isApproved[$img['id']] = (bool)($img['is_approved'] ?? false);
        }
    }

    public function updatedIsApproved($value, string $name): void
    {
        // Extract the image id from "isApproved.{id}"
        $parts = explode('.', $name, 2);
        $imageId = isset($parts[1]) ? (int)$parts[1] : (int)$parts[0];

        if (!$imageId) {
            return;
        }

        try {
            // Persist
            Image::query()->whereKey($imageId)->update([
                'is_approved' => (bool)$value,
            ]);

            foreach ($this->images as &$img) {
                if ((int)$img['id'] === $imageId) {
                    $img['is_approved'] = (bool)$value;
                    break;
                }
            }

            Notification::make()
                ->title($value ? 'Image approved' : 'Image unapproved')
                ->success()
                ->send();
        } catch (\Throwable $e) {
            $this->isApproved[$imageId] = ! (bool)$value;

            Notification::make()
                ->title('Update failed')
                ->body(app()->hasDebugModeEnabled() ? $e->getMessage() : 'Please try again.')
                ->danger()
                ->send();
        }
    }

    public function deleteImage(int $id): void
    {
        try {
            DB::beginTransaction();
            $image = Image::find($id);
            $media = $image->getFirstMedia('profile_images');

            $greaterThanImages = Image::whereUserId($this->user->id)
                ->where('sort_order', '>', $image->sort_order)
                ->get();

            foreach ($greaterThanImages as $greaterThanImage) {
                $greaterThanImage->decrement('sort_order');
                $greaterThanImage->save();
            }

            $media->delete();
            $image->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Notification::make()->title('Error deleting image')->danger()->send();
            \Log::error('Error deleting image: ' . $this->user->last_name . ' - ' . $image->id . ' - ' . $e->getMessage());
            return;
        } finally {
            $this->user->refresh();
            Notification::make()->title('Image deleted')->success()->send();
        }
    }

    public function render()
    {
        $media = [];
        foreach ($this->images as $image) {
            $media[] = [
                'id' => $image->id,
                'small' => $image->getFirstMediaUrl('profile_images', 'sm'),
                'large' => $image->getFirstMediaUrl('profile_images', 'lg'),
                'filename' => $image->getFirstMedia('profile_images')->file_name,
                'created_at' => $image->created_at->format('d-m-Y H:i'),
                'is_approved' => (bool)($this->isApproved[$image->id] ?? false),
            ];
        }

        return view('livewire.pages.admin.customer.images', compact('media'));
    }
}
