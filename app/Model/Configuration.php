<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table ='configurations';
    Protected $fillable=['name','email','phone','website','address','logo','fav_icon','fb_link','insta_link','twitter_link','youtube_link','created_by','updated_by'];
}
