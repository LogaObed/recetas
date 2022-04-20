<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Obed',
            'apellidop'=>'Loeza',
            'apellidom'=>'Garduño',
            'email'=>'obed@gmail.com',
            'password'=>Hash::make('12345678'),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name'=>'Eben',
            'apellidop'=>'Loeza',
            'apellidom'=>'Garduño',
            'email'=>'eben@gmail.com',
            'password'=>Hash::make('12345678'),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
