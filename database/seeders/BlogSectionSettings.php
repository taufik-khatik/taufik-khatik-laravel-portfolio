<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSectionSettings extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog_section_settings')->insert([
            'title' => 'My Blog',
            'sub_title' => 'Latest Articles',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
