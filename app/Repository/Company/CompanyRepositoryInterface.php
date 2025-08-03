<?php

namespace App\Repository\Company;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

interface CompanyRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(int $id): Company;
    public function create(array $data): Company;
    public function update(int $id, array $data): Company;
    public function delete(int $id): void;
    public function getByBuilding(int $id): Collection;
    public function getByActivity(int $id): Collection;
    public function searchByName(string $query);
}
