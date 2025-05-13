<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin(): bool
    {
        return $this->role && $this->role->name === 'admin';
    }

    public function isSystemAdmin(): bool
    {
        return $this->role && $this->role->name === 'system_admin';
    }

    public function canManageRoles(): bool
    {
        return $this->isAdmin() || $this->isSystemAdmin();
    }
    public function notifications()
    {
        return $this->hasMany(\App\Models\Notification::class); 
    }
}