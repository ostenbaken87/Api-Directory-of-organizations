<?php

namespace App\Repository\Building;

use Illuminate\Database\Eloquent\Collection;

interface BuildingRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
