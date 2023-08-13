<?php

namespace App\Http\Requests\Cala;

use App\Models\CalaCustomer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerSearchRequest extends FormRequest
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
            'customer_id' => ['nullable', 'regex:/^\d{0,7}$/', Rule::exists('customers', 'customer_id')],
            'transporter_id' => ['nullable', 'regex:/^\d{0,7}$/', Rule::exists('transporters', 'transporter_id')],
            'name' => 'nullable',
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
        return CalaCustomer::getAttributeNames();
    }
}
