<?php

namespace App\Actions\Building;

use App\Dto\BuildingDto\BuildingStoreDto;
use App\Models\Building;
use App\Services\BuildingService;


class BuildingStoreAction
{
    public function __construct(
        private BuildingService $service
    ){}

    public function handle(BuildingStoreDto $dto): Building
    {
        return $this->service->createBuilding($dto);
    }
}
