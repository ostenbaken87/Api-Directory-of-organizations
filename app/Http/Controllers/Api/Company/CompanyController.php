<?php

namespace App\Http\Controllers\Api\Company;

use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;
use App\Dto\SearchDto\SearchGeoDto;
use App\Http\Controllers\BaseController;
use App\Actions\Company\CompanyStoreAction;
use App\Http\Requests\Search\SearchRequest;
use App\Actions\Company\CompanyDeleteAction;
use App\Actions\Company\CompanyUpdateAction;
use App\Actions\Company\CompanyGetByIdAction;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Company\CompanyCollection;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Http\Requests\Search\SearchGeoRequest;
use App\Services\GeoSearchService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompanyController extends BaseController
{
    public function __construct(
        private CompanyService $service,
        private GeoSearchService $geoService
    ) {}

    public function index(): CompanyCollection
    {
        $companies = Company::with('phones', 'activities', 'building')->paginate(10);
        return new CompanyCollection($companies);
    }

    public function show(int $id, CompanyGetByIdAction $action): CompanyResource
    {
        $company = $action->handle($id);
        return new CompanyResource($company);
    }

    public function store(
        CompanyStoreRequest $request,
        CompanyStoreAction $action
    ): CompanyResource {
        $dto = $request->toDto();
        $company = $action->handle($dto);
        return new CompanyResource($company);
    }

    public function update(
        int $id,
        CompanyUpdateRequest $request,
        CompanyUpdateAction $action
    ): CompanyResource {
        $dto = $request->toDto();
        $company = $action->handle($id, $dto);
        return new CompanyResource($company);
    }

    public function destroy(int $id, CompanyDeleteAction $action): JsonResponse
    {
        $action->handle($id);
        return $this->defaultResponse('Company deleted successfully', 200);
    }

    public function byBuilding(int $buildingId, CompanyService $service): AnonymousResourceCollection
    {
        $companies = $service->getByBuilding($buildingId);
        return CompanyResource::collection($companies);
    }

    public function byActivity(int $activityId, CompanyService $service): AnonymousResourceCollection
    {
        $companies = $service->getByActivity($activityId);
        return CompanyResource::collection($companies);
    }

    public function search(SearchRequest $request, CompanyService $service): JsonResponse
    {
        $companies = $service->searchByName($request->input('name'));
        return $this->successResponse([
            'companies' => CompanyResource::collection($companies),
        ], "Found {$companies->count()} companies", 200);
    }

    public function searchGeo(SearchGeoRequest $request, GeoSearchService $geoService)
    {
        $dto = $request->toDto();
        $buildings = $geoService->searchInRadius($dto);

        $result = $buildings->map(function ($building) {
            return [
                'building' => [
                    'id' => $building->id,
                    'address' => $building->address,
                    'coordinates' => [
                        'latitude' => $building->latitude,
                        'longitude' => $building->longitude
                    ]
                ],
                'companies' => $building->companies->map(fn($c) => [
                    'id' => $c->id,
                    'name' => $c->name,
                    'phones' => $c->phones->pluck('number')
                ])
            ];
        });

        return $this->successResponse([
            'meta' => [
                'latitude' => $dto->lat,
                'longitude' => $dto->lng,
                'radius' => $dto->radius,
                'total_buildings' => $buildings->count(),
                'total_companies' => $buildings->sum(fn($b) => $b->companies->count())
            ],
            'results' => $result
        ], "Found {$buildings->count()} buildings", 200);
    }
}
