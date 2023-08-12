<?php

namespace App\Http\Requests;

use App\Common\Definition\FileDefs;
use App\Models\Menu;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MenuRegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('menus', 'name')->ignore($this->menuId, 'menu_id')],
            'cate_id' => ['nullable'],
            'food_id' => ['nullable'],
            'image' => ['nullable', 'image', 'max:'.FileDefs::IMAGE_MAX_SIZE],
            'description' => ['nullable'],
            'detail' => ['nullable'],
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
        return Menu::getAttributeNames();
    }
}
