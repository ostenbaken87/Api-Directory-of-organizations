<?php

namespace App\Services;

use App\Models\Building;
use App\Dto\BuildingDto\BuildingStoreDto;
use App\Dto\BuildingDto\BuildingUpdateDto;
use Illuminate\Database\Eloquent\Collection;
use App\Repository\Building\BuildingRepositoryInterface;

class BuildingService
{
    public function __construct(
        private BuildingRepositoryInterface $buildingRepository
    ){}

    public function getAllBuildings(): Collection
    {
        return $this->buildingRepository->getAll();
    }

    public function getBuildingById(int $id): Building
    {
        return $this->buildingRepository->getById($id);
    }

    public function createBuilding(BuildingStoreDto $dto)
    {
        return $this->buildingRepository->create([
           'address' => $dto->address,
           'latitude' => $dto->latitude,
           'longitude' => $dto->longitude
        ]);
    }

    public function updateBuilding(int $id, BuildingUpdateDto $dto)
    {
        return $this->buildingRepository->update($id, [
            'address' => $dto->address,
            'latitude' => $dto->latitude,
            'longitude' => $dto->longitude
        ]);
    }

    public function deleteBuilding(int $id): void
    {
        $this->buildingRepository->delete($id);
    }
}
