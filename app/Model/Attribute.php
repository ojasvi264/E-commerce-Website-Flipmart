<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table ='attributes';
    Protected $fillable=['name','product_id','value','status'];

    function  product(){
        $this->belongsTo(Product::class);
    }
}

