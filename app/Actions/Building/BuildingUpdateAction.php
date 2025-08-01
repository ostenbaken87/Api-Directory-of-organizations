<?php

namespace App\Actions\Building;

use App\Dto\BuildingDto\BuildingUpdateDto;
use App\Models\Building;
use App\Services\BuildingService;

class BuildingUpdateAction
{
    public function __construct(
        private BuildingService $service
    ){}

    public function handle(int $id, BuildingUpdateDto $dto): Building
    {
        return $this->service->updateBuilding($id,$dto);
    }
}
