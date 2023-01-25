<?php

namespace App\Models;

class OrderItems extends RModel
{
    protected $table = 'order_items';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'item_date'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
