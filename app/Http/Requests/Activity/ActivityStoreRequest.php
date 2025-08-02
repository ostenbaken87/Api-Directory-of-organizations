<?php

namespace App\Http\Requests\Activity;

use App\Dto\Activity\ActivityStoreDto;
use Illuminate\Foundation\Http\FormRequest;

class ActivityStoreRequest extends FormRequest
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
            'parent_id' => 'nullable|exists:activities,id',
        ];
    }

    public function toDto(): ActivityStoreDto
    {
        return new ActivityStoreDto(
            $this->input('name'),
            $this->input('parent_id')
        );
    }
}
