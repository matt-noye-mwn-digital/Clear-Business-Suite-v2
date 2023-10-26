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

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function assignee(){
        return $this->belongsTo(User::class);
    }
}
