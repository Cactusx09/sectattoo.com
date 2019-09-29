<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$JMSvM/1ZEI43XDqrZbh8duPOjPspEleHScEDvkVI55IiyKS0051rK',
            'remember_token' => null,
            'created_at'     => '2019-09-03 12:55:56',
            'updated_at'     => '2019-09-03 12:55:56',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
