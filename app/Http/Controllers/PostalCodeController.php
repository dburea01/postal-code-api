<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostalCodeResource;
use App\Services\PostalCodeService;
use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
    public $postalCodeService;

    public function __construct(PostalCodeService $postalCodeService)
    {
        $this->postalCodeService = $postalCodeService;
    }

    /**
     * Postal codes.
     *
     * Get a list of cities from a country, with a bla bla bla ....
     *
     * @urlParam country_id string The country ID you want the cities.
     * @urlParam search required What you are looking for. This can be a postal code (59320) or a string ("bec"). the service looks for an exact postal code OR a like city mame.
     * @response 200 scenario=success {
     *           "data": [
     *               {
     *                   "country_id": "FR",
     *                   "city_id": "59193",
     *                   "name": "EMMERIN",
     *                   "zip_code": "59320",
     *                   "gps_coordinates": "50.591061091, 3.005146823"
     *               }
     *           ]
     * }
     */
    public function index(Request $request)
    {
        $postalCodes = $this->postalCodeService->getPostalCodes($request->all());

        return PostalCodeResource::collection($postalCodes);
    }
}
