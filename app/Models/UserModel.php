<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythUserModel;

class UserModel extends MythUserModel
{
    // Extend dari Myth:Auth UserModel untuk mendapatkan fitur role management
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'email',
        'username',
        'password_hash',
        'reset_hash',
        'reset_at',
        'reset_expires',
        'activate_hash',
        'status',
        'status_message',
        'active',
        'force_pass_reset',
        'created_at',
        'updated_at',
        'deleted_at',
        'nama' // Field custom untuk nama lengkap
    ];
}