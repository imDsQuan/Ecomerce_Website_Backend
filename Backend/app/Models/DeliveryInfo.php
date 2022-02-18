<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'delivery_service_id',
        'receiver_name',
        'tel',
        'address',
    ];
}
