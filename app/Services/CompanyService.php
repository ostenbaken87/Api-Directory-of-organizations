<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Building;
use Illuminate\Support\Facades\DB;
use App\Dto\CompanyDto\CompanyStoreDto;
use App\Dto\CompanyDto\CompanyUpdateDto;
use Illuminate\Database\Eloquent\Collection;
use App\Repository\Company\CompanyRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompanyService
{
    public function __construct(
        private CompanyRepositoryInterface $repository
    ) {}

    public function getAllCompanies(): Collection
    {
        return $this->repository->getAll()->load(['phones', 'activities', 'building']);
    }

    public function getCompanyById(int $id): Company
    {
        return $this->repository->getById($id)->loadMissing(['phones', 'activities', 'building']);
    }

    public function createCompany(CompanyStoreDto $dto): Company
    {
        return DB::transaction(function () use ($dto) {

            if (!Building::where('id', $dto->building_id)->exists()) {
                throw new ModelNotFoundException('Building not found');
            }

            $company = $this->repository->create([
                'name' => $dto->name,
                'building_id' => $dto->building_id
            ]);

            $this->addPhones($company, $dto->phones);

            if (!empty($dto->activity_ids)) {
                $company->activities()->sync($dto->activity_ids);
            }

            return $company->load(['building', 'phones', 'activities']);
        });
    }

    public function updateCompany(int $id, CompanyUpdateDto $dto): Company
    {
        return DB::transaction(function () use ($id, $dto) {

            $company = $this->repository->getById($id);

            $updateData = [];
            if (isset($dto->name)) {
                $updateData['name'] = $dto->name;
            }
            if (isset($dto->building_id)) {

                if (!Building::where('id', $dto->building_id)->exists()) {
                    throw new ModelNotFoundException('Building not found');
                }
                $updateData['building_id'] = $dto->building_id;
            }

            if (!empty($updateData)) {
                $company = $this->repository->update($id, $updateData);
            }

            if (isset($dto->phones)) {
                $this->addPhones($company, $dto->phones);
            }

            if (isset($dto->activity_ids)) {
                $company->activities()->sync($dto->activity_ids);
            }

            return $company->load(['building', 'phones', 'activities']);
        });
    }

    public function deleteCompany(int $id): void
    {
        DB::transaction(function () use ($id): void {
            $this->repository->delete($id);
        });
    }

    protected function addPhones(Company $company, array $phones): void
    {
        $existingPhones = $company->phones->pluck('number')->toArray();

        foreach ($phones as $phone) {
            if (!in_array($phone, $existingPhones)) {
                $company->phones()->create(['number' => $phone]);
            }
        }
    }
}
