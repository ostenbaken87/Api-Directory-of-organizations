<?php

namespace App\Http\Requests\Building;

use App\Dto\BuildingDto\BuildingStoreDto;
use Illuminate\Foundation\Http\FormRequest;

class BuildingStoreRequest extends FormRequest
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
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ];
    }

    public function toDto(): BuildingStoreDto
    {
        return new BuildingStoreDto(
            $this->input('address'),
            $this->input('latitude'),
            $this->input('longitude')
        );
    }
}
