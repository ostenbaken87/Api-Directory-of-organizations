<?php

namespace App\Http\Requests\Company;

use App\Dto\CompanyDto\CompanyUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'building_id' => 'sometimes|integer|exists:buildings,id',
            'phones' => 'sometimes|array',
            'phones.*' => 'sometimes|string|max:20|unique:company_phones,number',
            'activity_ids' => 'sometimes|array',
            'activity_ids.*' => 'sometimes|exists:activities,id',
        ];
    }

    public function toDto(): CompanyUpdateDto
    {
        return new CompanyUpdateDto(
            $this->input('name'),
            $this->filled('building_id') ? (int)$this->input('building_id') : null,
            $this->input('phones'),
            $this->input('activity_ids')
        );
    }
}
