<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'email' => 'manager@ajr.com',
            'password' => bcrypt('manager'),
            'nama' => 'Manager',
            'access_level' => 'manager',
            'remember_token' => Str::random(60),
        ]);
        
        User::create([
            'email' => 'admin001@ajr.com',
            'password' => bcrypt('admin001'),
            'nama' => 'Admin 001',
            'access_level' => 'admin',
            'remember_token' => Str::random(60),
        ]);
    }
}
