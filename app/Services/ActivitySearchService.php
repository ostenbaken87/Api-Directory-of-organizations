<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Activity;

class ActivitySearchService
{
    public function searchByActivityWithChildren(int|string $activity)
    {
        $activityModel = $this->findActivity($activity);
        $activityIds = $this->getNestedActivityIds($activityModel);

        return Company::whereHas('activities', fn($q) => $q->whereIn('activities.id', $activityIds))
            ->with(['building', 'phones', 'activities'])
            ->get();
    }

    protected function findActivity(int|string $activity): Activity
    {
        return is_numeric($activity)
            ? Activity::findOrFail($activity)
            : Activity::where('name', $activity)->firstOrFail();
    }

    protected function getNestedActivityIds(Activity $activity): array
    {
        $ids = [$activity->id];

        foreach ($activity->children as $child) {
            $ids = array_merge($ids, $this->getNestedActivityIds($child));
        }

        return $ids;
    }
}
