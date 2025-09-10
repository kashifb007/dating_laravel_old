<?php

/**
 * Class CreateAddressAction
 * Author: Kashif Bhatti
 * 15/08/2025
 */

namespace App\Actions\Customer;

use App\DataTransferObjects\AddressDto;
use App\Models\Address;
use App\Services\AddressService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateAddressAction
{
    public function __construct(private readonly AddressService $service)
    {
    }

    public function handle(AddressDto $dto): ?Address
    {
        $address = null;

        try {
            $coOrdinates = $this->service->getCoOrdinates($dto);
            $dto->latitude = $coOrdinates['latitude'];
            $dto->longitude = $coOrdinates['longitude'];

            DB::beginTransaction();

            //can only have one address per user
            //soft delete the old address if it exists
            $oldAddress = Address::whereUserId($dto->userId)->first();

            if (filled($oldAddress)) {
                $oldAddress->delete();
            }

            $address = Address::create($dto->toArray());
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Address creation failed: user_id=' . $dto->userId . ' - ' . $e->getMessage());
        }

        return filled($address) ? $address : null;
    }
}
