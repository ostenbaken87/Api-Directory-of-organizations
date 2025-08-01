<?php

namespace App\Repository\Building;

use App\Models\Building;
use Illuminate\Database\Eloquent\Collection;

class BuildingRepository implements BuildingRepositoryInterface
{
    public function getAll(): Collection
    {
        return Building::all();
    }

    public function getById(int $id): Building
    {
        return Building::findOrFail($id);
    }

    public function create(array $data): Building
    {
        return Building::create($data);
    }

    public function update(int $id, array $data): Building
    {
        $building = $this->getById($id);
        $building->update($data);
        return $building;
    }

    public function delete(int $id): void
    {
        $building = $this->getById($id);
        $building->delete();
    }
}
