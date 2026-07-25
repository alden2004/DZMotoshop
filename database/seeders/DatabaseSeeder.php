<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    public function run()
    {


        User::create([

            'name'=>'Admin',

            'email'=>'admin@gmail.com',

            'password'=>Hash::make('admin12345'),

            'role'=>'admin'

        ]);



        User::create([

            'name'=>'User',

            'email'=>'user@gmail.com',

            'password'=>Hash::make('user12345'),

            'role'=>'user'

        ]);



        $this->call([

            ProductSeeder::class

        ]);

    }
}