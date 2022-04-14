<?php

namespace Database\Seeders;

use App\Models\SMTP;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SMTPSeeder extends Seeder
{

    public function run()
    {
        SMTP::create([
        ]);
    }
}
