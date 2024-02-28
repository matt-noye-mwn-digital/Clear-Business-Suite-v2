<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date_time',
        'end_date_time',
        'total_time',
        'description',
        'status',
        'user_id',
        'project_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
