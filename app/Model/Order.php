<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['customers_id', 'name', 'email', 'phone', 'address', 'shipping_address', 'order_date', 'order_status', 'payment_mode', 'payment_key', 'total_amount', 'status'];
}