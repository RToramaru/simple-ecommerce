<?php

namespace App\Models;

class User extends RModel
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
}
