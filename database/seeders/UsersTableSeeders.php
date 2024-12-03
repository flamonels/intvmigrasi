<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'userbprs',
                'username' => 'userbprs',
                'email' => 'user.bprs@gmail.com',
                'password' => Hash::make('123123'),
                'status' => 'customer',
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => 1
            ],
            [
                'name' => 'administrator',
                'username' => 'administrator',
                'email' => 'user.admin@gmail.com',
                'password' => Hash::make('123123'),
                'status' => 'admin',
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => 1
            ],
            [
                'name' => 'adrianpradanu',
                'username' => 'adrianpradanu',
                'email' => 'adrian.pradanu@gmail.com',
                'password' => Hash::make('123123'),
                'status' => 'customer',
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => 1
            ],
            [
                'name' => 'dandoridwanto',
                'username' => 'dandoridwanto',
                'email' => 'dando.ridwanto@gmail.com',
                'password' => Hash::make('123123'),
                'status' => 'admin',
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => 1
            ]
        ]);
    }
}
