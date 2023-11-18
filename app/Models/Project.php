<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'project_type_id',
        'project_status',
        'progress',
        'billing_type',
        'fixed_rate_price',
        'rate_per_hour',
        'project_total',
        'estimated_hours',
        'start_date',
        'due_date',
        'description',
        'files',
        'staff_id',
        'client_id',
        'project_notes_id',
        'project_tasks_id',
    ];
    public function staffMember(){
        return $this->belongsTo(User::class);
    }
    public function client(){
        return $this->belongsTo(User::class);
    }
    public function projectType(){
        return $this->belongsTo(ProjectType::class);
    }
    public function projectNote(){
        return $this->hasMany(ProjectNote::class);
    }
    public function projectTask(){
        return $this->hasMany(ProjectTask::class);
    }

    public function projectMilestone(){
        return $this->hasMany(ProjectMilestone::class);
    }
}
