<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['nullable', 'confirmed', 'min:6'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
            'status' => ['nullable', 'string', 'max:15'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'default_language' => ['nullable', 'string', 'max:255'],
            'address_line_one' => ['nullable', 'string', 'max:255'],
            'address_line_two' => ['nullable', 'string', 'max:255'],
            'town_city' => ['nullable', 'string', 'max:255'],
            'state_county' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'landline_number' => ['nullable', 'numeric', 'min:10', 'max:15'],
            'mobile_number' => ['nullable', 'numeric', 'min:10', 'max:15'],
            'website' => ['nullable', 'url', 'max:255'],
            'default_payment_method' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'max:50000'],
        ];
    }
}
