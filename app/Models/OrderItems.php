<?php

namespace App\Models;

class OrderItems extends RModel
{
    protected $table = 'order_items';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'item_date'];
}
