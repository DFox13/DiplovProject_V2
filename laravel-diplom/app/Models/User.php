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
        'discount',
        'visit_dates' 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'visit_dates' => 'array',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function isUser(): bool
    {
        return $this->role && $this->role->name === 'user';
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

    public function canManageStaff(): bool
    {
        return $this->isSystemAdmin();
    }

    public function canManageStocks(): bool
    {
        return $this->isAdmin() || $this->isSystemAdmin();
    }
}