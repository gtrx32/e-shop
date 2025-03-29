<?php

namespace App\Http\Requests;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone' => [
                'nullable',
                'string',
                'regex:/^(\+7|7|8)[0-9]{10}$/',
                'max:15',
            ],
            'delivery_address' => [
                'nullable',
                'string',
                'max:255',
            ],
            'payment_method' => [
                'required',
                Rule::in(PaymentMethod::values()),
            ]
        ];
    }
}
