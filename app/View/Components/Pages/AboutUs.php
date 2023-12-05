<?php

namespace App\View\Components\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use App\Models\TeamMember;



class AboutUs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $members = Cache::rememberForever('teamMembers', function () {
            return TeamMember::all();
        });
        return view('components.pages.about-us')->with('teamMembers',$members->take(6)->pluck('image_url')->all());
    }
}
