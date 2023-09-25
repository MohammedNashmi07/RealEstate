<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            //admin
           [
               'name' => 'Admin',
               'user_name' =>'admin',
               'email' => 'admin@gmail.com',
               'password' => Hash::make('123456'),
               'role' =>'admin',
               'status' => 'active'

           ],
            //agent
           [
               'name' => 'Agent',
               'user_name' =>'agent',
               'email' => 'agent@gmail.com',
               'password' => Hash::make('123456'),
               'role' =>'agent',
               'status' => 'active'

           ],
            //agent
           [
               'name' => 'User',
               'user_name' =>'user',
               'email' => 'user@gmail.com',
               'password' => Hash::make('123456'),
               'role' =>'user',
               'status' => 'active'

           ]
        ];
        DB::table('users')->insert($data);
    }
}
