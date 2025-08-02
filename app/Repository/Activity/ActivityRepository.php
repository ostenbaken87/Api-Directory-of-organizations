<?php

namespace App\Repository\Activity;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Collection;

class ActivityRepository implements ActivityRepositoryInterface
{
    public function getAll(): Collection
    {
        return Activity::all();
    }

    public function getTree(): Collection
    {
        return Activity::with('children')->whereNull('parent_id')->get();
    }

    public function getById(int $id): Activity
    {
        return Activity::findOrFail($id);
    }

    public function create(array $data): Activity
    {
        return Activity::create($data);
    }

    public function update(int $id, array $data): Activity
    {
        $activity = $this->getById($id);
        $activity->update($data);
        return $activity;
    }

    public function delete(int $id)
    {
        $activity = $this->getById($id);
        $activity->delete();
    }
}
