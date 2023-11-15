<?php

namespace App\Providers;

use App\Models\GalleryActivity;
use App\Models\Portfolio;
use App\Models\TeamMember;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('globalPortfolios',Portfolio::take(4)->get());
        View::share('globalTeamMembers',TeamMember::take(6)->select('image_url')->get());
        View::share('globalActivityGallery',GalleryActivity::select('image_url')->limit(31)->get());
    }
}
