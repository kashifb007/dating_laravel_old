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
        $images = $this->user->images()->orderBy('sort_order')->get();
        $media = [];
        foreach ($images as $image) {
            $media[] = [
                'id' => $image->id,
                'small' => $image->getFirstMediaUrl('profile_images', 'sm'),
                'large' => $image->getFirstMediaUrl('profile_images', 'lg'),
                'filename' => $image->getFirstMedia('profile_images')->file_name,
                'created_at' => $image->created_at->format('d-m-Y H:i'),
            ];
        }

        return view('livewire.pages.admin.customer.images', compact('media'));
    }
}
