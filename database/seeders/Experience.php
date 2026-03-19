<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Experience extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('experiences')->insert([
            'title' => 'My Experience',
            'image' => 'hero.jpg',
            'phone' => '1234567890',
            'email' => 'mail@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
