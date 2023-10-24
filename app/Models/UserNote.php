<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'make_sticky',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
