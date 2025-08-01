<?php

namespace App\Http\Requests\Building;

use App\Dto\BuildingDto\BuildingUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class BuildingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'address' => 'sometimes|string|max:255',
            'latitude' => 'sometimes|numeric',
            'longitude' => 'sometimes|numeric',
        ];
    }

    public function toDto(): BuildingUpdateDto
    {
        return new BuildingUpdateDto(
            $this->input('address'),
            $this->input('latitude'),
            $this->input('longitude')
        );
    }
}
