<?php

namespace App\Models;

class Order extends RModel
{
    protected $table = 'orders';
    protected $fillable = ['order_date', 'status', 'user_id'];
}
