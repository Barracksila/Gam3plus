<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Define the table name (if not the default 'admins')
    protected $table = 'admins';

    // Mass assignable attributes (whitelist)
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Hidden attributes (usually for passwords or sensitive data)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Cast attributes to specific types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Custom method for admin users (for example, you can add a role system here).
     */
    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }
}
