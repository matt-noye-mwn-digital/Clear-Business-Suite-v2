<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectTaskStoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'due_date' => ['nullable', 'date'],
            'priority' => ['nullable', 'string', 'max:100'],
            'description' => ['required', 'max:200000'],
            'project_id' => ['required', 'integer'],
            'status' => ['required', 'string', 'max:100'],
            'assignee_id' => ['required', 'integer'],
        ];
    }
}
