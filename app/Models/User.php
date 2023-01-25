<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

class User extends RModel implements Authenticatable
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];

    public function getAuthIdentifierName()
    {
        return $this->getKey();
    }

    public function getAuthIdentifier()
    {
        return $this->email;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
    }

    public function setRememberToken($value)
    {
    }

    public function getRememberTokenName()
    {
    }
}
