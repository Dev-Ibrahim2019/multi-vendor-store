<?php

namespace App\Models;

use App\Concerns\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends User {
    use HasFactory,
        Notifiable,
        HasApiTokens,
        HasRoles;

    protected $fillable = [
        'name', 'username', 'email', 'phone_number', 'password', 'super_admin', 'status'
    ];
}
