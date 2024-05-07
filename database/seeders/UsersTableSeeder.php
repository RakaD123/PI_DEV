<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{


    public function run() : void
    {

        User::create(
            [
                'name' => 'ADMIN',
                'email' => 'pidev@gmail.com',
                'password' => bcrypt ('12345678'),
            ]
        );
    }
}

