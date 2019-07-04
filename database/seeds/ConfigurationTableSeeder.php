<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('configurations')->insert([
           'name'=>'Demo Website',
           'email'=>'info@demo.com',
           'phone'=>'011112334',
           'website'=>'www.demo.com',
           'address'=>'Demo Park, Demo',
           'logo'=>'logo.png',
           'fav_icon'=>'favicon.png',
           'fb_link'=>'http://www.facebook.com',
           'twitter_link'=>'http://www.twitter.com',
           'insta_link'=>'http://www.instagram.com',
           'youtube_link'=>'http://www.youtube.com',
           'created_by'=>'1',
           'updated_by'=>'1',
       ]);
    }
}
