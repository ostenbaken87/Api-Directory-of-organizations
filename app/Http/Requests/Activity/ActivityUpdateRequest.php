<?php

namespace App\Http\Requests\Activity;

use App\Dto\Activity\ActivityUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class ActivityUpdateRequest extends FormRequest
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
            'parent_id' => 'nullable|exists:activities,id',
        ];
    }

    public function toDto(): ActivityUpdateDto
    {
        return new ActivityUpdateDto(
            name: $this->input('name'),
            parent_id: $this->input('parent_id'),
        );
    }
}
