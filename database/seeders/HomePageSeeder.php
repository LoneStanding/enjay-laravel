<?php

namespace Database\Seeders;

use App\Models\HomePageSections;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePageSections::create([
        'section_title' => 'About Us',
        'subsection_title' => 'Our Mission',
        'content' => '<p>We aim to deliver high-quality...</p>',
    ]);
    }
}
