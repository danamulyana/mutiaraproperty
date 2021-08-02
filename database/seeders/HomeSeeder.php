<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homes')->insert([
            'main_title' => 'mutiara property',
            'main_video_link' => 'https://www.youtube.com/embed/y9j-BL5ocW8',
            'section1_title' => 'mutiara section 1',
            'section1_video_link' => 'https://www.youtube.com/embed/y9j-BL5ocW8',
            'title_carausel1' => 'carausel1',
            'title_carausel2' => 'carausel2',
            'newslater_title' => 'subscribe now',
            'newslater_subtitle' => 'free room 1',
            'update_name' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
