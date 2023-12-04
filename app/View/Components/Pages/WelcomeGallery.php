<?php

namespace App\View\Components\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\GalleryActivity;
use Illuminate\Support\Facades\Cache;

class WelcomeGallery extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $galleries = Cache::rememberForever("galleries", function () {
            return GalleryActivity::all()->sortByDesc('updated_at');
        });
        return view('components.pages.welcome-gallery')
        ->with('galleries',$galleries->take(15)->all());
    }
}
