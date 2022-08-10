<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class BasicUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $user = User::create([
            'name' => 'DefaultUser',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $admin->assignRole('admin');
        $user->assignRole('user');
    }
}
