<?php

namespace App\Http\Controllers\Api\Activity;

use App\Services\ActivityService;
use Illuminate\Http\JsonResponse;
use App\Services\ActivitySearchService;
use App\Http\Controllers\BaseController;
use App\Actions\Activity\ActivityStoreAction;
use App\Actions\Activity\ActivityUpdateAction;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Activity\ActivityResource;
use App\Http\Resources\Activity\ActivityCollection;
use App\Http\Requests\Activity\ActivityStoreRequest;
use App\Http\Requests\Activity\ActivityUpdateRequest;

class ActivityController extends BaseController
{
    public function __construct(
        private ActivityService $service,
        private ActivitySearchService $searchService
    ) {}

    public function index(): ActivityCollection
    {
        $activities = $this->service->getAllActivity();
        return new ActivityCollection($activities);
    }

    public function tree(): ActivityCollection
    {
        $tree = $this->service->getTreeActivity();
        return new ActivityCollection($tree);
    }

    public function store(ActivityStoreRequest $request, ActivityStoreAction $action): JsonResponse
    {
        $activity = $action->handle($request->toDto());
        return $this->successResponse([
            new ActivityResource($activity)
        ], 'Activity created successfully');
    }

    public function show(int $activityId): JsonResponse
    {
        $activity = $this->service->getActivityById($activityId);
        return $this->successResponse([
            new ActivityResource($activity)
        ], "Activity get by id: $activityId");
    }

    public function update(int $activityId, ActivityUpdateRequest $request, ActivityUpdateAction $action): JsonResponse
    {
        $activity = $action->handle($activityId, $request->toDto());
        return $this->successResponse([
            new ActivityResource($activity),
        ], "Activity by id: $activityId updated successfully");
    }

    public function destroy(int $activityId): JsonResponse
    {
        $this->service->deleteActivity($activityId);
        return response()->json([
            'message' => "Activity by id: $activityId deleted successfully"
        ]);
    }

    public function searchByActivity(string $activityIdentifier): JsonResponse
    {
        try {
            $companies = $this->searchService->searchByActivityWithChildren($activityIdentifier);

            return response()->json([
                'success' => true,
                'activity' => $activityIdentifier,
                'companies_count' => $companies->count(),
                'companies' => CompanyResource::collection($companies)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Activity not found'
            ], 404);
        }
    }
}
