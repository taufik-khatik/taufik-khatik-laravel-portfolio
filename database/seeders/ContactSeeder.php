<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    public function run()
    {
        DB::table('contact_section_settings')->insert([
            [
                'title' => 'Contact Me',
                'sub_title' => 'I would like to request a quote.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Contact Me',
                'sub_title' => 'I would like to request a quote.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
