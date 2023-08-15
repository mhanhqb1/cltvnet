<?php

namespace App\Http\Requests;

use App\Common\Definition\IngredientType;
use App\Common\Definition\FileDefs;
use App\Common\Definition\Unit;
use App\Models\Ingredient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class IngredientRegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('ingredients', 'name')->ignore($this->ingredientId, 'ingredient_id')],
            'cate_id' => ['nullable'],
            'nutrition_id' => ['nullable'],
            'image' => ['nullable', 'image', 'max:'.FileDefs::IMAGE_MAX_SIZE],
            'description' => ['nullable'],
            'detail' => ['nullable'],
            'unit' => ['required', new Enum(Unit::class)],
            'price_unit' => ['nullable', 'integer'],
            'price' => ['nullable', 'integer'],
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
