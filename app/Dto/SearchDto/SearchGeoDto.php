<?php

namespace App\Dto\SearchDto;

class SearchGeoDto
{
    public function __construct(
        public readonly float $lat,
        public readonly float $lng,
        public readonly float $radius
    ) {}
}
