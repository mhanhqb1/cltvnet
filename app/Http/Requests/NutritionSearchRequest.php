<?php

namespace App\Http\Requests;

use App\Models\Nutrition;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NutritionSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nutrition_id' => ['nullable', 'regex:/^\d{0,7}$/', Rule::exists('nutritions', 'nutrition_id')],
            'name' => 'nullable',
            'slug' => 'nullable'
        ];
    }

    /**
     * Get the messages apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return Nutrition::getAttributeNames();
    }
}
