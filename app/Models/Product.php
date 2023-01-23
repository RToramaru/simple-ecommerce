<?php

namespace App\Models;

class Product extends RModel
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'category_id', 'photograph'];
}
