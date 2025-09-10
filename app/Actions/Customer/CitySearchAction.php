<?php

/**
 * Class CitySearchAction
 * Author: Kashif Bhatti
 * 25/08/2025
 */

namespace App\Actions\Customer;

use App\DataTransferObjects\NominatimDto;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * https://nominatim.openstreetmap.org/search?q=manchester&format=json&limit=5&city=
 */
class CitySearchAction
{
    public function __construct()
    {
    }

    public function handle(NominatimDto $dto): array
    {
        $filteredData = [];
        if (!Cache::has('nomatim.city.'.strtolower($dto->language).strtolower($dto->q))) {
            $data = $dto->toArray();
            try {
                $response = Http::nominatim()->withQueryParameters(
                    $data
                )->get('search');
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return ['error' => $e->getMessage()];
            }

            $data = json_decode($response, true);

            // Filter to only include specific fields and sort by importance
            $filteredData = array_map(function ($item) {
                return [
                    'place_id' => $item['place_id'],
                    'lat' => $item['lat'],
                    'lon' => $item['lon'],
                    'name' => $item['name'],
                    'display_name' => $item['display_name'],
                    'country_code' => strtoupper($item['address']['country_code']),
                    'importance' => $item['importance'] ?? 0
                ];
            }, $data);

            // Sort by importance in descending order
            usort($filteredData, function ($a, $b) {
                return $b['importance'] <=> $a['importance'];
            });
            Cache::put('nomatim.city.'.strtolower($dto->language).strtolower($dto->q), $filteredData, now()->addHour());
        } else {
            $filteredData = Cache::get('nomatim.city.'.strtolower($dto->language).strtolower($dto->q));
        }

        // Add the attribution
        $result = [
            'data' => $filteredData,
            'powered_by' => 'Powered by Nominatim/OpenStreetMap - http://osm.org/copyright'
        ];

        return $result;
    }
}
