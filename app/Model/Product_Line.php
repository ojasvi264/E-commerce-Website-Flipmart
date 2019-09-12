<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_Line extends Model
{
    protected $table ='product_lines';
    Protected $fillable=['category_id','subcategory_id','name','slug','rank','status','created_by','updated_by'];

    function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }

    function category(){
        return $this->belongsTo(Category::class);
    }

    function  products(){
        return $this->hasMany(Product::class,'product_line_id');
    }

}
