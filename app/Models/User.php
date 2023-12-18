<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getStatus(){
        return match ($this->status) {
            'active' => '<span class="badge text-bg-success">Active</span>',
            'on_hold' => '<span class="badge text-bg-info">On Hold</span>',
            'inactive' => '<span class="badge text-bg-warning">Inactive</span>',
            'closed' => '<span class="badge text-bg-danger">Closed</span>'
        };
    }

    public function userDetails(){
        return $this->hasOne(UserDetail::class);
    }
    public function lead(){
        return $this->hasMany(Lead::class);
    }
    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
    public function todo(){
        return $this->hasMany(Todo::class);
    }
    public function UserNote(){
        return $this->hasMany(UserNote::class);
    }
    public function projectTask(){
        return $this->hasMany(ProjectTask::class);
    }
    public function projectMilestone(){
        return $this->hasMany(ProjectMilestone::class);
    }

    public function invoice(){
        return $this->hasMany(Invoice::class);
    }
}
