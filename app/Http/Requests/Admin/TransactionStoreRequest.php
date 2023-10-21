<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
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
            'date_time' => ['required', 'date'],
            'payment_method' => ['required', 'string'],
            'description' => ['required'],
            'amount_in' => ['nullable', 'numeric'],
            'amount_out' => ['nullable', 'numeric'],
            'fees' => ['nullable', 'numeric'],
            'transaction_id' => ['nullable', 'string', 'max:255'],
            'invoice_id' => ['nullable', 'string', 'max:100'],
            'user_id' => ['nullable', 'integer']
        ];
    }
}
