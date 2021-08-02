<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utils')->insert([
            [
                'logo' => 'logo.png',
                'address' => 'alamat',
                'name_site' => 'Mutiara Property',
                'telp_site' => '08213131231',
                'email_site' => 'mail@mutiaraproperty.com',
                'whatsapp_no' => '+620921313',
                'whatsapp_message' => 'tes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
