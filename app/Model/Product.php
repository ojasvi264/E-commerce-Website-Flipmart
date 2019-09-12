<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable=['category_id','subcategory_id','name','slug','price','discount','quantity','stock','short_description','description',
        'feature_key','discount_key','meta_keyword','meta_description','status','created_by','updated_by','product_line_id'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function category()
    {
        return $this->belongsTo(Category:: class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory:: class);
    }
    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function images()
    {
        return $this->hasMany(Image:: class);
    }

    public function product_line()
    {
        return $this->belongsTo(Product_Line:: class,'product_line_id');
    }
}


