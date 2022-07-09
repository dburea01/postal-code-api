<?php

namespace App\Services;

use App\Models\PostalCode;

class PostalCodeService
{
    public function getPostalCodes(array $filters)
    {
        $postalCodes = PostalCode::orderBy('name');

        if (array_key_exists('country_id', $filters) && $filters['country_id'] !== '') {
            $postalCodes->where('country_id', $filters['country_id']);
        }

        if (array_key_exists('search', $filters) && $filters['search'] !== '') {
            $postalCodes->where(function ($query) use ($filters) {
                $query->orWhere('name', 'ilike', '%' . $filters['search'] . '%')
                ->orWhere('zip_code', $filters['search']);
            });
        }

        return $postalCodes->take(10)->get();
    }
}
