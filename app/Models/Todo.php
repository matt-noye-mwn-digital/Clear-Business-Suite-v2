<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
        'completed_at',
        'user_id'
    ];

    public function getStatus(){
        return match ($this->status) {
            'new' => '<span class="badge text-bg-primary position-relative">New <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"><span class="visually-hidden">New alerts</span></span>',
            'pending' => '<span class="badge text-bg-warning">Pending</span>',
            'in-progress' => '<span class="badge text-bg-info">In-progress</span>',
            'completed' => '<span class="badge text-bg-success">Completed</span>',
        };
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
