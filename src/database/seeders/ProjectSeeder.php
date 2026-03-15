<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'My First Project',
            'description' => 'This is an awesome project built with Laravel and HTMX.',
            'image' => 'https://via.placeholder.com/400x200',
            'link' => 'https://example.com',
            'skills' => 'Laravel, HTMX, Tailwind',
        ]);
    }
}