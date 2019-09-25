<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable {
    use Notifiable;

    protected $table= 'admins';
    protected $guard = 'admin';
    protected $fillable = [
    'name', 'email', 'password',
    ];
}