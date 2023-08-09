<?php

namespace App\Http\Requests;

use App\Common\Definition\FoodType;
use App\Common\Definition\FileDefs;
use App\Common\Definition\Level;
use App\Models\Food;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class FoodRegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('foods', 'name')->ignore($this->foodId, 'food_id')],
            'cate_id' => ['nullable'],
            'image' => ['nullable', 'image', 'max:'.FileDefs::IMAGE_MAX_SIZE],
            'description' => ['nullable'],
            'detail' => ['nullable'],
            'type' => ['required', new Enum(FoodType::class)],
            'level' => ['required', new Enum(Level::class)],
            'time' => ['nullable', 'integer'],
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
