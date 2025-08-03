<?php

namespace App\Http\Controllers\Api\Company;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\BaseController;
use App\Actions\Company\CompanyStoreAction;
use App\Actions\Company\CompanyDeleteAction;
use App\Actions\Company\CompanyUpdateAction;
use App\Actions\Company\CompanyGetByIdAction;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Company\CompanyCollection;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Models\Company;

class CompanyController extends BaseController
{
    public function index(): CompanyCollection
    {
        $companies = Company::with('phones', 'activities', 'building')->paginate(5);
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
}
