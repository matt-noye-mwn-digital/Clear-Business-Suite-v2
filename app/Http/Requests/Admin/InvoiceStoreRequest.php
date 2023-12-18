<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreRequest extends FormRequest
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
            'client_id' => ['required', 'integer'],
            'invoice_date' => ['required', 'date'],
            'due_date' => ['required', 'date'],
            'invoice_number' => ['nullable', 'string'],
            'payment_method' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:100'],
            'invoice_discount' => ['nullable', 'numeric'],
            'tax_amount' => ['nullable', 'numeric'],
            'sub_title' => ['nullable', 'numeric'],
            'total' => ['nullable', 'numeric'],
            'lineItems.0.description' => ['required', 'string', 'max:5000'],
            'lineItems.0.quantity' => ['required', 'numeric'],
            'lineItems.0.amount' => ['required', 'numeric'],
        ];
    }
}
