<?php

namespace App\Actions\Activity;

use App\Models\Activity;
use App\Services\ActivityService;
use App\Dto\Activity\ActivityUpdateDto;

class ActivityUpdateAction
{
    public function __construct(
        private ActivityService $service
    ){}

    public function handle(int $id, ActivityUpdateDto $dto): Activity
    {
        return $this->service->updateActivity($id, $dto);
    }
}
