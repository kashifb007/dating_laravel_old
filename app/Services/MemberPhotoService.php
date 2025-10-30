<?php
/**
 * Class MemberPhotoService
 * Author: Kashif Bhatti
 * 07/10/2025
 */

namespace App\Services;

use App\Http\Requests\Api\UploadPhotosRequest;
use App\Interfaces\FetchImagesInterface;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MemberPhotoService
{
    public function uploadImage(UploadPhotosRequest $request): bool
    {
        try {
            DB::beginTransaction();
            $image = Image::create([
                'user_id' => $request->user_id
            ]);

            $image->collectionName = 'profile_images';
            $image->fileName = $request->file('photo')->getClientOriginalName();
            $image->realPath = $request->file('photo')->getRealPath();

            $mediaService = new MediaService($image);
            $mediaService->store();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error creating photo for user id = $request->user_id", [$e->getMessage()]);
            return false;
        }
    }

    public function deleteImage(int $userId, int $imageId): bool
    {
        $image = Image::find($imageId);

        if ($image) {
            if ($image->getFirstMedia('profile_images') !== null) {
                $image->getFirstMedia('profile_images')->delete();
            }

            //reorder remaining images
            Image::where('user_id', $userId)
                ->where('id', '!=', $image->id)
                ->where('sort_order', '>', $image->sort_order)
                ->decrement('sort_order');

            $image->delete();
        }
        return true;
    }

    public function reorderImages(int $userId, string $draggedKey, string $targetKey): bool
    {
        $draggedId = (int)$draggedKey;
        $targetId = (int)$targetKey;

        $draggedImage = Image::find($draggedId);
        $targetImage = Image::find($targetId);

        if ($draggedImage && $targetImage && $draggedId !== $targetId) {
            $oldOrder = $draggedImage->sort_order;
            $newOrder = $targetImage->sort_order;

            //if moving down (increasing sort_order)
            if ($oldOrder < $newOrder) {
                // Decrement sort_order of all images that were before the target image
                Image::where('user_id', $userId)
                    ->where('id', '!=', $draggedImage->id)
                    ->where('sort_order', '<=', $newOrder)
                    ->where('sort_order', '>', $oldOrder)
                    ->decrement('sort_order');
                $draggedImage->sort_order = $newOrder;
                $draggedImage->save();
            }

            //if moving up (decreasing sort_order)
            if ($oldOrder > $newOrder) {
                // Increment sort_order of all images that were after the target image
                Image::where('user_id', $userId)
                    ->where('id', '!=', $draggedImage->id)
                    ->where('sort_order', '<', $oldOrder)
                    ->where('sort_order', '>=', $newOrder)
                    ->increment('sort_order');
                $draggedImage->sort_order = $newOrder;
                $draggedImage->save();
            }
        }

        return true;
    }

    public function moveUp(int $userId, int $imageId): bool
    {
        $image = Image::find($imageId);

        if ($image->sort_order === 0) {
            return true;
        }

        $oldImage = Image::where('user_id', $userId)
            ->where('sort_order', $image->sort_order - 1)
            ->first();

        if ($oldImage) {
            ++$oldImage->sort_order;
            $oldImage->save();
            --$image->sort_order;
            $image->save();
        }

        return true;
    }

    public function moveDown(int $userId, int $imageId, int $uploadedImagesCount): bool
    {
        $image = Image::find($imageId);

        if ($image->sort_order + 1 >= $uploadedImagesCount) {
            return true;
        }

        $oldImage = Image::where('user_id', $userId)
            ->where('sort_order', $image->sort_order + 1)
            ->first();

        if ($oldImage) {
            --$oldImage->sort_order;
            $oldImage->save();
            ++$image->sort_order;
            $image->save();
        }

        return true;
    }

    public function fetchImages(FetchImagesInterface $fetchImages): array
    {
        $imagesArr = [];
        $images = $fetchImages->fetchImages();
        $uploadedImagesCount = $images->count();

        foreach ($images as $image) {
            $imagesArr[] = [
                'id' => $image->id,
                'sm' => $image->getFirstMediaUrl('profile_images', 'sm'),
                'md' => $image->getFirstMediaUrl('profile_images', 'md'),
                'created_at' => $image->created_at,
                'sort_order' => $image->sort_order,
                'approved' => (int)$image->is_approved,
            ];
        }

        return [$imagesArr, $uploadedImagesCount];
    }
}
