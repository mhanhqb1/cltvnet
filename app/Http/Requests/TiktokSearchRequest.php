<?php

namespace App\Http\Requests;

use App\Common\Definition\TiktokType;
use App\Models\Tiktok;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class TiktokSearchRequest extends FormRequest
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
            'id' => ['nullable', 'regex:/^\d{0,7}$/', Rule::exists('tiktoks', 'id')],
            'type' => ['nullable', new Enum(TiktokType::class)],
            'unique_id' => 'nullable'
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
        return Tiktok::getAttributeNames();
    }
}
