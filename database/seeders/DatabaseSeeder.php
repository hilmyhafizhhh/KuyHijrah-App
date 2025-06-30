<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            "name"=> "Dakwah",
            "slug"=> "dakwah",
        ]);

        Category::create([
            "name"=> "Dunia Islam",
            "slug"=> "dunia-islam",
        ]);

        Category::create([
            "name"=> "Lifestyle Islami",
            "slug"=> "lifestyle-islami",
        ]);

        Category::create([
            "name"=> "Wawasan / Umum",
            "slug"=> "Wawasan-Umum",
        ]);

        User::create([
            "name" => 'Kompas',
            "slug"=> "kompas",
        ]);

        User::create([
            "name" => 'Detik',
            "slug"=> "detik",
        ]);

        User::create([
            "name" => 'CNN Indonesia',
            "slug"=> "cnn-indonesia",
        ]);

        User::create([
            "name" => 'Liputan6',
            "slug"=> "liputan6",
        ]);

        User::create([
            "name" => 'Tribun News',
            "slug"=> "tribun-news",
        ]);

        Admin::create([
            "name" => 'Hilmy Hafizh',
            "email" => 'hafizhhilmy17@gmail.com',
            "password"=> bcrypt("tamankota"),
        ]);

        Admin::create([
            "name" => 'Arya Suprobo',
            "email" => 'aryasuprobo2766@gmail.com',
            "password"=> bcrypt("admin123"),
        ]);

        Admin::create([
            "name" => 'Adam Nur Zidane',
            "email" => 'adamnurzidane025@gmail.com',
            "password"=> bcrypt("admin123"),
        ]);

        News::factory(20)->create();

        
    }
}
