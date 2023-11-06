<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\ContactMenu;
use App\Models\Division;
use App\Models\GalleryActivity;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Division::factory()->has(
            TeamMember::factory()->count(3),
            'teamMembers'
            )->count(3)->create();

        Portfolio::factory()->has(
            PortfolioImage::factory()->count(1),
            'portfolioImage'
            )->has(
                Category::factory()->count(1),
            )->count(8)->create();




        Article::factory()->count(2)->create();

        GalleryActivity::factory()->count(3)->create();

        ContactMenu::factory()->count(3)->create();


    }   
}
