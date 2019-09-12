<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'description', 'status'];
}
