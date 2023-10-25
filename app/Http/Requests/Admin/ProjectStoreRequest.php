<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            'project_name' => ['required', 'string', 'max:255'],
            'project_type_id' => ['required', 'integer'],
            'project_status' => ['required', 'string', 'max:255'],
            'progress' => ['nullable', 'integer'],
            'billing_type' => ['required', 'string', 'max:255'],
            'fixed_rate_price' => ['nullable', 'numeric'],
            'rate_per_hour' => ['nullable', 'numeric'],
            'project_total' => ['nullable', 'numeric'],
            'estimated_hours' => ['nullable', 'string'],
            'start_date' => ['required', 'date'],
            'due_date' => ['nullable', 'date'],
            'description' => ['nullable'],
            'files' => ['nullable'],
            'staff_id' => ['required', 'integer'],
            'client_id' => ['nullable', 'integer'],
        ];
    }
}
