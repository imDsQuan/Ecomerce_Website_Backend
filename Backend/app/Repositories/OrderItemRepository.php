<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderItem;

class OrderItemRepository extends EloquentRepository
{

    public function getModel()
    {
        return OrderItem::class;
    }

    public function getByOrderId($id){
        return Order::find($id)->orderItems->toArray();
    }
}
