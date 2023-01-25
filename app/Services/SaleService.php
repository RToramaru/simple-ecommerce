<?php

namespace App\Services;

use Log;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;

class SaleService{
    public function finalize_sale($products = [], User $user){
        try{
            \DB::beginTransaction();

            $date = new \DateTime();

            $order = new Order();
            $order->order_date = $date->format('Y-m-d H:i:s');
            $order->status = '';
            $order->user_id = $user->id;
            $order->save();

            foreach($products as $product){
                $order_item = new OrderItems();
                $order_item->order_id = $order->id;
                $order_item->product_id = $product->id;
                $order_item->quantity = 1;
                $order_item->price = $product->price;
                $order_item->item_date = $date->format('Y-m-d H:i:s');
                $order_item->save();
            }

            \DB::commit();
            return ['status' => 'success', 'message' => 'Venda finalizada com sucesso!'];
        }catch(\Exception $e){
            \Log::error("ERROR", ['file' => $e->getFile(), 'message' => $e->getMessage()]);
            \DB::rollBack();
            return ['status' => 'error', 'message' => 'Erro ao finalizar venda!'];
        }
    }
}