<?php

namespace App\Http\Requests;

use App\Common\Definition\Unit;
use App\Models\Ingredient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class IngredientSearchRequest extends FormRequest
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
            'ingredient_id' => ['nullable', 'regex:/^\d{0,7}$/', Rule::exists('ingredients', 'ingredient_id')],
            'name' => 'nullable',
            'slug' => 'nullable',
            'unit' => ['nullable', new Enum(Unit::class)],
            'cate_id' => ['nullable', Rule::exists('cates', 'cate_id')],
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
        return Ingredient::getAttributeNames();
    }
}
