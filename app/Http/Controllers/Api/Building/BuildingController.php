<?php

namespace App\Http\Controllers\Api\Building;

use App\Services\BuildingService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\BaseController;
use App\Actions\Building\BuildingStoreAction;
use App\Actions\Building\BuildingUpdateAction;
use App\Http\Resources\Building\BuildingResource;
use App\Http\Resources\Building\BuildingCollection;
use App\Http\Requests\Building\BuildingStoreRequest;
use App\Http\Requests\Building\BuildingUpdateRequest;

class BuildingController extends BaseController
{
    public function __construct(private BuildingService $service) {}

    public function index(): BuildingCollection
    {
        $building = $this->service->getAllBuildings();
        return new BuildingCollection($building);
    }

    public function store(BuildingStoreRequest $request, BuildingStoreAction $action): JsonResponse
    {
        $dto = $request->toDto();
        $building = $action->handle($dto);
        return $this->successResponse([
            new BuildingResource($building),
        ], 'Building created successfully');
    }

    public function show(int $buildingId): JsonResponse
    {
        $building = $this->service->getBuildingById($buildingId);
        return $this->successResponse([
            new BuildingResource($building),
        ],"Building get by id: $buildingId");
    }

    public function update(int $buildingId, BuildingUpdateRequest $request, BuildingUpdateAction $action): JsonResponse
    {
        $dto = $request->toDto();
        $building = $action->handle($buildingId, $dto);
        return $this->successResponse([
            new BuildingResource($building),
            "Building by id: $buildingId updated successfully"
        ], 200);
    }

    public function destroy(int $buildingId): JsonResponse
    {
        $this->service->deleteBuilding($buildingId);
        return $this->defaultResponse("Building by id: $buildingId deleted successfully",200);
    }
}
