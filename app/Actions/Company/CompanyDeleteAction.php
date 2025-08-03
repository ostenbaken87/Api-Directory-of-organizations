<?php

namespace App\Actions\Company;

use App\Services\CompanyService;
use Illuminate\Support\Facades\DB;

class CompanyDeleteAction
{
    public function __construct(
        private CompanyService $service
    ) {}

    public function handle(int $id): void
    {
        DB::transaction(function () use ($id) {
            $this->service->deleteCompany($id);
        });
    }
}
