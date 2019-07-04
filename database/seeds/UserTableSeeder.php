<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=>4,
            'name'=>'admin kumar',
            'email'=>'admin@admin.com',
            'password'=>\Illuminate\Support\Facades\Hash::make('admin123'),

        ]);

        DB::table('users')->insert([
            'id'=>5,
            'name'=>'editor kumar',
            'email'=>'editor@admin.com',
            'password'=>\Illuminate\Support\Facades\Hash::make('admin123'),

        ]);
    }
}
