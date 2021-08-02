<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'total_users' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user',
                'total_users' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
