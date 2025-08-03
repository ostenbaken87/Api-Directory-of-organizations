<?php

namespace App\Http\Requests\Company;

use App\Dto\CompanyDto\CompanyStoreDto;
use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'building_id' => 'required|exists:buildings,id',
            'phones' => 'required|array',
            'phones.*' => 'required|string|max:20|unique:company_phones,number',
            'activity_ids' => 'required|array',
            'activity_ids.*' => 'required|exists:activities,id',
        ];
    }

    public function toDto(): CompanyStoreDto
    {
        return new CompanyStoreDto(
            $this->input('name'),
            $this->input('building_id'),
            $this->input('phones'),
            $this->input('activity_ids'),
        );
    }

    public function messages()
    {
        return [
            'activity_ids.required' => 'Необходимо указать хотя бы один вид деятельности',
            'activity_ids.*.exists' => 'Указан несуществующий вид деятельности :input'
        ];
    }
}
