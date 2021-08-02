<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Visitor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Visitor::factory(50)->create();
    }
}
