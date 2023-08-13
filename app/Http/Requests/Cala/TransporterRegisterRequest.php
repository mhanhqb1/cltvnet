<?php

namespace App\Http\Requests\Cala;

use App\Common\Definition\FileDefs;
use App\Models\CalaTransporter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransporterRegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('cala_transporters', 'name')->ignore($this->transporterId, 'transporter_id')],
            'address' => ['required'],
            'phone' => ['required'],
            'time_start' => ['required'],
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
        return CalaTransporter::getAttributeNames();
    }
}
