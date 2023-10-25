<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'main_content',
        'show_to_client',
        'project_id'
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }

}
