<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pages;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pages::create([
            'title' => 'Page Title',
            'link'=>'test1',
            'desc'=>"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.",
            'seo_title' => 'Seo Title',
            'seo_keyword'=> 'Seo Keyword',
            'seo_desc'=> 'Seo Description',

        ]);
    }
}
