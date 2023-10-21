<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LeadStoreRequest extends FormRequest
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
            'lead_status' => ['required', 'string', 'max:75'],
            'lead_source' => ['required', 'string', 'max:75'],
            'lead_assignee_id' => ['required', 'integer'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'landline_number' => ['nullable', 'numeric', 'min:10', 'max:15'],
            'mobile_number' => ['nullable', 'numeric', 'min:10', 'max:15'],
            'website' => ['nullable', 'url', 'max:255'],
            'address_line_one' => ['nullable', 'string', 'max:255'],
            'address_line_two' => ['nullable', 'string', 'max:255'],
            'town_city' => ['nullable', 'string', 'max:255'],
            'state_county' => ['nullable', 'string', 'max:255'],
            'zip_postcode' => ['nullable', 'string', 'max:30'],
            'country' => ['nullable', 'string', 'max:75'],
            'lead_value' => ['nullable', 'decimal'],
            'description' => ['nullable']
        ];
    }
}
