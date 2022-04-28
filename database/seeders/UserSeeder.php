<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  =>  'User 1',
            'email' =>  'user1@user1.com',
            'password' =>  bcrypt('user1@user1.com'),
            'role_id' =>  1,
        ]);
    }
}
