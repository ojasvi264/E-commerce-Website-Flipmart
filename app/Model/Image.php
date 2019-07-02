<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='images';
    Protected $fillable=['product_id','image','status'];
}
