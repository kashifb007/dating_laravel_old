<?php

namespace App\Http\Controllers\Api;

use App\Actions\Customer\CitySearchAction;
use App\DataTransferObjects\NominatimDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NominatimRequest;

class CitySearchController extends Controller
{
    public function __invoke(NominatimRequest $request)
    {
        return new CitySearchAction()->handle(NominatimDto::fromApiRequest($request));
    }
}
