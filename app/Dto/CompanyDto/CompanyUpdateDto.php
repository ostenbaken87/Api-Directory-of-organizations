<?php

namespace App\Dto\CompanyDto;

class CompanyUpdateDto
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?int $building_id,
        public readonly ?array $phones,
        public readonly ?array $activity_ids
    ) {
    }
}
