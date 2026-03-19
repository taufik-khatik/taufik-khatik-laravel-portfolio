<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Blog extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            'title' => 'My First Blog Post',
            'image' => 'hero.jpg',
            'category' => 1,
            'description' => 'This is the description for my first blog post. It provides insights into my journey as a web developer and the projects I have worked on.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
