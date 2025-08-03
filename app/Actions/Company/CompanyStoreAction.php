<?php

namespace App\Actions\Company;

use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Support\Facades\DB;
use App\Dto\CompanyDto\CompanyStoreDto;

class CompanyStoreAction
{
    public function __construct(
        private CompanyService $service
    ){}

    public function handle(CompanyStoreDto $dto): Company
    {
        return DB::transaction(function () use ($dto) {
           $company = $this->service->createCompany($dto);
           return $company->load(['phones', 'activities', 'building']);
        });
    }
}
