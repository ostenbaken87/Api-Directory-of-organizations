<?php

namespace App\Dto\BuildingDto;

class BuildingUpdateDto
{
    public function __construct(
        public readonly string $address,
        public readonly float $latitude,
        public readonly float $longitude
    ){}
}
