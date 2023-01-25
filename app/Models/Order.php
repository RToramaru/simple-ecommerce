<?php

namespace App\Models;

class Order extends RModel
{
    protected $table = 'orders';
    protected $order_date = ['order_date'];
    protected $fillable = ['order_date', 'status', 'user_id'];

    public function status()
    {
        $description = [
            'P' => 'Pendente',
            'C' => 'Cancelado',
            'F' => 'Finalizado'
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItems::class);
    }
}
