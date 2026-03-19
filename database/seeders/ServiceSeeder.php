<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            [
                'name' => 'Laravel Development',
                'description' => 'Development of web applications using the Laravel framework',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'UI/UX Design',
                'description' => 'Attractive and intuitive designs for web applications',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
