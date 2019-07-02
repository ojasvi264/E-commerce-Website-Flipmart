<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table ='tags';
    Protected $fillable=['name','slug','rank','status','meta_keyword','meta_description','created_by','updated_by'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
