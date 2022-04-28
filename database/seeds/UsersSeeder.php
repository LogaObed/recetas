<?php

use App\User;
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
        $usuario = User::create([
            'name' => 'Obed',
            'apellidop' => 'Loeza',
            'apellidom' => 'Garduño',
            'email' => 'obed@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $usuario2 = User::create([
            'name' => 'Eben',
            'apellidop' => 'Loeza',
            'apellidom' => 'Garduño',
            'email' => 'eben@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
