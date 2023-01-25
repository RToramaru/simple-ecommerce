<?php

namespace App\Models;


class Address extends RModel
{
    protected $table = 'addresses';
    protected $fillable = ['user_id', 'city', 'state', 'number', 'complement', 'cep', 'street'];

}
