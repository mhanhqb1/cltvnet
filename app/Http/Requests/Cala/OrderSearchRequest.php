<?php

namespace App\Http\Requests\Cala;

use App\Models\CalaOrder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderSearchRequest extends FormRequest
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
            'order_id' => ['nullable', 'regex:/^\d{0,7}$/', Rule::exists('cala_orders', 'order_id')],
            'customer_id' => ['nullable', 'regex:/^\d{0,7}$/', Rule::exists('cala_customers', 'customer_id')],
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
        return CalaOrder::getAttributeNames();
    }
}
