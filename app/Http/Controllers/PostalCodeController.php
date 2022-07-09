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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $postalCodes = $this->postalCodeService->getPostalCodes($request->all());

        return PostalCodeResource::collection($postalCodes);
    }
}
