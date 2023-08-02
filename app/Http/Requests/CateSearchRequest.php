<?php

namespace App\Http\Requests;

use App\Common\Definition\CateType;
use App\Models\Cate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class CateSearchRequest extends FormRequest
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
            'cate_id' => ['nullable', 'regex:/^\d{0,7}$/', Rule::exists('cates', 'cate_id')],
            'type' => ['nullable', new Enum(CateType::class)],
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
        return Cate::getAttributeNames();
    }
}
