<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date',
        'due_date',
        'priority',
        'description',
        'project_id',
        'status',
        'assignee_id'
    ];

    public function getStatus(){
        return match($this->status) {
            'not_started' => '<span class="badge text-bg-secondary">Not Started</span>',
            'in_progress' => '<span class="badge text-bg-info">In Progress</span>',
            'testing' => '<span class="badge text-bs-danger">Testing</span>',
            'awaiting_feedback' => '<span class="badge text-bg-warning">Awaiting Feedback</span>',
            'complete' => '<span class="badge text-bg-success">Complete</span>'
        };
    }
    public function getPriority(){
        return match($this->priority) {
            'low' => '<span class="badge text-bg-secondary">Low</span>',
            'medium' => '<span class="badge text-bg-success">Medium</span>',
            'high' => '<span class="badge text-bg-warning">High</span>',
            'urgent' => '<span class="badge text-bg-danger">! High</span>',
        };
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function assignee(){
        return $this->belongsTo(User::class);
    }
}
