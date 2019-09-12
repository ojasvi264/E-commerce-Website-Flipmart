<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table='subcategories';
    protected $fillable=['category_id','name','rank','slug','meta_keyword','meta_description','created_by','updated_by','status'];

    function category(){
        return  $this->belongsTo(Category::class);
    }
    function products(){
        return $this->hasMany(Product::class);
    }

    function product_lines(){
        return $this->hasMany(Product_Line::class,'subcategory_id');
    }
}

