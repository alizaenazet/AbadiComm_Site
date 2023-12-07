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
use App\Models\PortfolioPromoter;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOr(function () {
            User::factory()->create([
                "id" => 1,
                'name' => 'admin',
                'password' => bcrypt('admin123'),
                'email' => 'contact@abadicomm.id',
            ]);
        });
        
        // \App\Models\User::factory(10)->create();

        // Division::factory()->has(
        //     TeamMember::factory()->count(3),
        //     'teamMembers'
        //     )->count(3)->create();
        //     for ($i=0; $i < 14; $i++) { 
        //         # code...
        //         Portfolio::factory()->has(
        //             PortfolioImage::factory()->count(rand(1,5)),
        //             'portfolioImage'
        //             )->has(
        //             PortfolioPromoter::factory()->count(rand(1,3)),
        //             'portfolioPromoter'
        //             )->has(
        //                 Category::factory()->count(rand(1,3)),
        //             )->count(1)->create();
        //     }




        // // Article::factory()->count(2)->create();

        // // GalleryActivity::factory()->count(3)->create();

        // ContactMenu::factory()->count(3)->create();


    }   
}
