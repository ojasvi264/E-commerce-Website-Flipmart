<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='categories';
    Protected $fillable=['name','slug','rank','status','meta_keyword','meta_description','created_by','updated_by','image'];

    function subcategories(){
        return $this->hasMany(SubCategory::class);
    }
    function products(){
        return $this->hasMany(Product::class);
    }

    function product_lines(){
        return $this->hasMany(Product_Line::class);
    }
}
