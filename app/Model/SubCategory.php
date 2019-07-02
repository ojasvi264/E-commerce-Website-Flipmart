<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table='subcategories';
    protected $fillable=['category_id','name','rank','slug','meta_keyword','meta_description','created_by','updated_by','status'];

    function category(){
        $this->belongsTo(Category::class);
    }
    function products(){
        $this->hasMany(Product::class);
    }
}

