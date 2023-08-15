<?php

namespace App\Http\Requests\Cala;

use App\Common\Definition\OrderStatus;
use App\Models\CalaOrder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class OrderRegisterRequest extends FormRequest
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
            'customer_id' => ['required', Rule::exists('cala_customers', 'customer_id')],
            'status' => ['required', new Enum(OrderStatus::class)],
            'order_date' => ['required', 'date', 'date_format:Y-m-d'],
            'delivery_date' => ['nullable', 'date', 'date_format:Y-m-d'],
            'paid_date' => ['nullable', 'date', 'date_format:Y-m-d'],
            'shipping_time' => ['nullable'],
            'product_id' => ['nullable'],
            'note' => ['nullable'],
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
