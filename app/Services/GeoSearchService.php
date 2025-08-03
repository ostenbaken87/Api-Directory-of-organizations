<?php

namespace App\Services;

use App\Dto\SearchDto\SearchGeoDto;
use App\Models\Building;

class GeoSearchService
{
    public function searchInRadius(SearchGeoDto $dto)
    {
        return Building::with(['companies' => function($query) {
                $query->select(['id', 'name', 'building_id']);
            }])
            ->whereRaw(
                "ST_Distance_Sphere(POINT(longitude, latitude), POINT(?, ?)) <= ?",
                [$dto->lng, $dto->lat, $dto->radius]
            )
            ->get(['id', 'address', 'latitude', 'longitude']);
    }
}
