<?php

namespace App\Dto\CompanyDto;

class CompanyStoreDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $building_id,
        public readonly array $phones,
        public readonly array $activity_ids
    ) {
    }
}
