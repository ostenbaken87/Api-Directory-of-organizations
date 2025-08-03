<?php

namespace App\Actions\Company;

use App\Models\Company;
use App\Services\CompanyService;

class CompanyGetByIdAction
{
    public function __construct(
        private CompanyService $service
    ) {}

    public function handle(int $id): Company
    {
        return $this->service->getCompanyById($id)
            ->loadMissing(['building', 'phones', 'activities']);
    }
}
