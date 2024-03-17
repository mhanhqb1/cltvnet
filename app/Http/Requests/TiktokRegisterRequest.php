<?php

namespace App\Http\Requests;

use App\Common\Definition\TiktokType;
use App\Common\Definition\FileDefs;
use App\Models\Tiktok;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class TiktokRegisterRequest extends FormRequest
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
            'unique_id' => ['required', 'string', 'max:255', Rule::unique('tiktoks', 'unique_id')->ignore($this->tiktokId)],
            'note' => ['nullable'],
            'type' => ['required', new Enum(TiktokType::class)],
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
