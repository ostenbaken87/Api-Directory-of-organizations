<?php

namespace App\Actions\Company;

use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Support\Facades\DB;
use App\Dto\CompanyDto\CompanyUpdateDto;

class CompanyUpdateAction
{
    public function __construct(
        private CompanyService $service
    ) {}

    public function handle(int $id, CompanyUpdateDto $dto): Company
    {
        return DB::transaction(function () use ($id, $dto) {
            $company = $this->service->updateCompany($id, $dto);

            return $company->load(['building', 'phones', 'activities']);
        });
    }
}
