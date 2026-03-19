<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('abouts')->insert([
            'title' => 'Who I Am',
            'description' => 'I am a passionate web developer with experience in PHP, Laravel and modern technologies.',
            'image' => 'about.jpg', // Make sure you have this image in `storage/app/public/`
            'resume' => 'resume.pdf', // PDF file for the resume
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
