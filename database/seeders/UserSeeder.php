<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username'=>'Admin',
            'surname'=>'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$qEa8pCfCa27SKsugcKTk5OBLtUonJaICIQaqwpjd1hhlzyDjfKskO', // admin
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

    }
}
