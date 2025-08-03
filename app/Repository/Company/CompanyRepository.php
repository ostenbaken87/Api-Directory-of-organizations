<?php

namespace App\Repository\Company;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function getAll(): Collection
    {
        return Company::all();
    }

    public function getById($id): Company
    {
        return Company::findOrFail($id);
    }

    public function create($data): Company
    {
        return Company::create($data);
    }

    public function update($id, $data): Company
    {
        $company = $this->getById($id);
        $company->update($data);
        return $company;
    }

    public function delete($id): void
    {
        $company = $this->getById($id);
        $company->delete();
    }
}
