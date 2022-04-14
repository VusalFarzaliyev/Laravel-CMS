<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([SettingGoogleSeeder::class,SettingFacebookSeeder::class,SMTPSeeder::class,PageSeeder::class,UserSeeder::class,CategorySeeder::class,RoleAndPermissionSeeder::class,]);

        // \App\Models\User::factory(10)->create();
    }
}
