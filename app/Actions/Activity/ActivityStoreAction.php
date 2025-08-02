<?php

namespace App\Actions\Activity;

use App\Models\Activity;
use App\Services\ActivityService;
use App\Dto\Activity\ActivityStoreDto;

class ActivityStoreAction
{
    public function __construct(
        private ActivityService $service
    ){}

    public function handle(ActivityStoreDto $dto): Activity
    {
        return $this->service->createActivity($dto);
    }
}
