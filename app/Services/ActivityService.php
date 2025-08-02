<?php

namespace App\Services;

use App\Models\Activity;
use App\Dto\Activity\ActivityStoreDto;
use App\Dto\Activity\ActivityUpdateDto;
use Illuminate\Database\Eloquent\Collection;
use App\Repository\Activity\ActivityRepositoryInterface;

class ActivityService
{
    public function __construct(
        private ActivityRepositoryInterface $repository
    ){}

    public function getAllActivity(): Collection
    {
        return $this->repository->getAll();
    }

    public function getTreeActivity(): Collection
    {
        return $this->repository->getTree();
    }

    public function getActivityById(int $id): Activity
    {
        return $this->repository->getById($id);
    }

    public function createActivity(ActivityStoreDto $dto): Activity
    {
        return $this->repository->create([
            'name' => $dto->name,
            'parent_id' => $dto->parent_id
        ]);
    }

    public function updateActivity(int $id, ActivityUpdateDto $dto): Activity
    {
        return $this->repository->update($id, [
            'name' => $dto->name,
            'parent_id' => $dto->parent_id
        ]);
    }

    public function deleteActivity(int $id)
    {
        $this->repository->delete($id);
    }
}
