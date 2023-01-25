<?php

namespace App\Models;

class Product extends RModel
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItems::class);
    }
}
