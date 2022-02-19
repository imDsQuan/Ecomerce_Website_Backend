<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id',
        'total',
        'payment_method',
        'status',
        'order_date'];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

}
