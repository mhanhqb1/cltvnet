<?php

namespace App\Http\Requests;

use App\Models\Food;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FoodSearchRequest extends FormRequest
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
            'food_id' => ['nullable', 'regex:/^\d{0,7}$/', Rule::exists('foods', 'food_id')],
            'name' => 'nullable',
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
        return Food::getAttributeNames();
    }
}
