<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectMilestoneStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'due_date' => ['required', 'date'],
            'description' => ['required', 'max:50000'],
            'order' => ['nullable', 'integer'],
            'project_id' => ['required', 'integer'],
            'assignee_id' => ['required', 'integer'],
            'status' => ['required', 'string', 'max:255'],
            'priority' => ['required', 'string', 'max:255']
        ];
    }
}
