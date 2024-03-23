<?php

namespace App\Http\Requests\Cala;

use App\Common\Definition\FileDefs;
use App\Models\CalaCustomer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('cala_customers', 'name')->ignore($this->customerId, 'customer_id')],
            'image' => ['nullable', 'image', 'max:'.FileDefs::CALA_IMAGE_MAX_SIZE],
            'address' => ['required'],
            'phone' => ['required'],
            'facebook' => ['nullable'],
            'zalo' => ['nullable'],
            'shipping_name' => ['nullable'],
            'shipping_phone' => ['nullable'],
            'shipping_address' => ['nullable'],
            'transporter_id' => ['nullable', Rule::exists('cala_transporters', 'transporter_id')],
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
