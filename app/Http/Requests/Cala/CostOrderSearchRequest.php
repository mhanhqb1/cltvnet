<?php

namespace App\Http\Requests\Cala;

use App\Models\CalaCostOrder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CostOrderSearchRequest extends FormRequest
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
            'cost_order_id' => ['nullable', 'regex:/^\d{0,7}$/', Rule::exists('cala_CostOrders', 'CostOrder_id')],
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
        return CalaCostOrder::getAttributeNames();
    }
}
