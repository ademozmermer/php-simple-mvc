<?php

namespace App\Models;

use System\Library\Database\BaseModel;

class User extends BaseModel
{
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password'
    ];
}